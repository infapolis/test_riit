<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Test</title>
    <script type="text/javascript" src="/ext/examples/shared/include-ext.js"></script>
    <script type="text/javascript" src="/ext/locale/ext-lang-ru.js"></script>
    <link rel="stylesheet" type="text/css" href="/ext/examples/shared/example.css" />
    <link rel="stylesheet" type="text/css" href="/ext/examples/ux/grid/css/GridFilters.css" />
    <link rel="stylesheet" type="text/css" href="/ext/examples/ux/grid/css/RangeMenu.css" />
    <style>
        body {
            background: #fff;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
</head>
<body>
</body>
<script type="text/javascript">
    Ext.Loader.setConfig({enabled: true});
    Ext.Loader.setPath('Ext.ux', '/ext/examples/ux');
    Ext.require([
        'Ext.selection.CellModel',
        'Ext.grid.*',
        'Ext.data.*',
        'Ext.util.*',
        'Ext.form.*',
        'Ext.ux.grid.FiltersFeature',
        'Ext.toolbar.Paging'
    ]);

    Ext.define('Person', {
        extend: 'Ext.data.Model',
        fields: [{
            name: 'id',
            type: 'int'
        }, {
            name: 'person_name'
        }, {
            name: 'education'
        }, {
            name: 'city'
        }]
    });

    Ext.define('Education', {
        extend: 'Ext.data.Model',
        fields: [{
            name: 'id',
            type: 'int'
        }, {
            name: 'text'
        }]
    });


    Ext.define('Cities', {
        extend: 'Ext.data.Model',
        fields: [{
            name: 'id',
            type: 'int'
        }, {
            name: 'text'
        }]
    });

    Ext.onReady(function() {

        var filters = {
            ftype: 'filters',
            encode: true,
            local: false,
            filters: [{
                type: 'boolean',
                dataIndex: 'visible'
            }]
        };

        var store=Ext.create('Ext.data.JsonStore', {
            autoDestroy: true,
            model: 'Person',
            proxy: {
                type: 'ajax',
                url: '/api/get/',
                reader: {
                    type: 'json',
                    root: 'data',
                    idProperty: 'id',
                    totalProperty: 'total'
                }
            },
            remoteSort: true,
            sorters: [{
                property: 'person_name',
                direction: 'ASC'
            }],
            pageSize: 10
        });

        var edu_store=new Ext.create('Ext.data.JsonStore', {
            model: 'Education',
            proxy: {
                type: 'ajax',
                url: '/api/get-edu/',
                reader: {
                    type: 'json',
                    root: 'education_levels',
                    idProperty: 'id'
                }
            },
        });

        var cities_store=new Ext.create('Ext.data.JsonStore', {
            model: 'Cities',
            proxy: {
                type: 'ajax',
                url: '/api/get-cities/',
                reader: {
                    type: 'json',
                    root: 'ref_cities',
                    idProperty: 'id'
                }
            },
        });

        var createColumns=function (finish, start) {
            var columns=[{
                dataIndex: 'person_name',
                text: 'Имя',
                id: 'person_name',
                flex: .4
            }, {
                dataIndex: 'education',
                text: 'Образование',
                sortable: false,
                flex: .2,
                editor: new Ext.form.field.ComboBox({
                    typeAhead: false,
                    triggerAction: 'all',
                    displayField: 'text',
                    valueField: 'text',
                    store: edu_store
                }),
                filter: {
                    type: 'list',
                    store: edu_store,
                    phpMode: true
                }
            }, {
                dataIndex: 'city',
                text: 'Город',
                flex: .4,
                sortable: false,
                filter: {
                    type: 'list',
                    store: cities_store,
                    phpMode: true
                },
                renderer: function (v) {
                    var cities='';
                    for (i=0; i<v.length; i++) {
                        if (i>0) cities+=',<br>';
                        cities+=v[i]['name'];
                    }
                    return cities;
                }
            }];
            return columns.slice(start || 0, finish);
        };

        var grid=Ext.create('Ext.grid.Panel', {
            region: "center", split: true, border: false, collapsible: false,
            store: store,
            columns: createColumns(3),
            loadMask: true,
            features: [filters],
            dockedItems: [Ext.create('Ext.toolbar.Paging', {
                dock: 'bottom',
                store: store
            })],
            emptyText: 'No Matching Records',
            plugins: [
                Ext.create('Ext.grid.plugin.CellEditing', {
                    clicksToEdit: 1
                })
            ]
        });

        grid.on('edit', function(editor, e) {
            if (e.originalValue!=e.value) {
                Ext.Ajax.request({
                    url: '/api/update-edu/?user_id='+e.record.id+'&edu_value='+e.value,
                    success: function(response, options){
                        var objAjax = Ext.decode(response.responseText);
                        alert(objAjax.res);
                    },
                    failure: function(response, options){
                        alert("Ошибка: "+response.statusText);
                    }
                });
            }
            e.record.commit();
        });

        new Ext.Viewport({
            title: "Viewport",
            layout: "border",
            defaults: {
                bodyStyle: "background-color: #FFFFFF;",
                frame: true
            },
            items: [grid]
        });

        store.load();
        edu_store.load();
    });
</script>
</html>
