import $ from "jquery";
let SliderControlTable = function (selector) {

    this.selector = selector;
    this.events();
}

SliderControlTable.prototype.events = function () {

    var self = this;
    var url = $(self.selector).data('url');

    $(function () {

        /**
         * Accept and Black List,Search
         */


        $(document).on('change', '#is_accepted', function () {
            $(this).parent().submit();
        });

        $(document).on('change keyup ', '.search_input', function () {

            url = $(self.selector).data('url') + '?' + $('#tableform').serialize();

            console.log('urlXXX', url);

            // self.table.ajax.reload(null, false);
            self.table.ajax.url(url).load();

        });



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
                    data.data ='';
                }
            },

            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'destination'},
                {data: 'edit'},
                {data: 'delete'}

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
         *
         * Manupilated Data
         */

        self.table.on('xhr.dt', function (e, settings, json, xhr) {

            //var theme = $(this.selector).data("template");
            $.each(json.data, function (index, item) {

                var csrf = $('meta[name="csrf-token"]').attr('content');
                json.data[index] = item;
                console.log(item.id)
                console.log('heyy2y')
                json.data[index].edit = '<a href="/sliderGroup/index/' + item.id + '/TR/" class="btn btn-info btn-sm " target="_blank"><i class="fas fa-pen"></i></a>';
                console.log( json.data[index].edit);
                json.data[index].delete = `
                    <form method="post" action="/slider/destroy/${item.id}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="${csrf}">
                        <button type="submit" class=" btn btn-danger btn-sm ">delete</button>
                    </form>`;
                {
                }
            });

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
    SliderControlTable
}


