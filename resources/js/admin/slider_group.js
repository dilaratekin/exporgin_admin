import $ from "jquery";

let SliderGroupControl = function (selector) {

    this.selector = selector;
    this.events();
}

SliderGroupControl.prototype.events = function () {

    var self = this;
    var url = $(self.selector).data('url');


    $(function () {

        console.log(url);

        self.table = $(self.selector).DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            retrieve: true,
            // dom: 'rt<"row"<"col-auto mr-auto"i><"col-auto pt-2"l><"col-auto"p>>',
            lengthMenu: [10, 50, 100],
            pageLength: 10,
            oLanguage: {sProcessing: "<div id='loader'>Loading..</div>"},

            ajax: {
                url: url,
                type: 'GET',
                dataSrc: "data",
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                error: function (request, status, error) {
                    console.log(status, error);
                    alert('fail');

                },
                data: function (data) {
                    data.data = '';
                }
            },

            columns: [

                {
                    name: 'id',
                    title: 'id',
                    data: function (row) {
                        return row.id;
                    }
                },


                {
                    name: 'name',
                    title: 'Name',
                    data: function (row) {
                        console.log('row', row);
                        console.log(row);
                        if(row.get_slider_group_descriptions.length>0){

                        return row.get_slider_group_descriptions[0]['name'];
                        }
                    }
                },

                {
                    name: 'lang',
                    title: 'Language',
                    data: function (row) {
                        if(row.get_slider_group_descriptions.length>0) {
                            return row.get_slider_group_descriptions[0]['language'];
                        }
                    }
                },

                {
                    name: '',
                    title: '#',
                    data: function (row) {
                        if(row.get_slider_group_descriptions.length>0){
                        let lang = row.get_slider_group_descriptions[0]['language'];

                        return '<a href="/sliderItem/index/' + row.id + '/' + lang + '" target="_blank" class="btn btn-info btn-sm "><i class="fas fa-pen"></i></a>';

                    }
                    }
                },

            ],
            drawCallback: function (settings) {
                var response = settings.json;
            },
            order: [
                [0, "desc"]
            ],


            columnDefs: [{
                orderable: false,
                //Columns are not ordered
                //targets: [1,4,5,9,10]
            }, {
                "defaultContent": "-",
                "targets": "_all",
            }],
        });


        /**
         * Drawing The Table
         */


        self.table.on('draw', function () {
            $('.dropdown-toggle').dropdown();

        });


    });

}

export {
    SliderGroupControl
}


