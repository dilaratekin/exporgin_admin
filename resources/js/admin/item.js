import $ from "jquery";

let ItemControlTable = function (selector) {

    this.selector = selector;
    this.events();
}

ItemControlTable.prototype.events = function () {

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
                    name: 'lang',
                    title: 'Language',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['lang'];
                        }
                        return 'No Records';
                    }
                },
                {
                    name: 'image_url',
                    title: 'Image Url',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['image_url'];
                        }
                        return 'No Records';
                    }
                },    {
                    name: 'background_url',
                    title: 'Background Url',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['background_url'];
                        }
                        return 'No Records';
                    }
                },    {
                    name: 'thumb_url',
                    title: 'Thumb Url',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['thumb_url'];
                        }
                        return 'No Records';
                    }
                },    {
                    name: 'title',
                    title: 'Title',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['title'];
                        }
                        return 'No Records';
                    }
                },
                {
                    name: 'content',
                    title: 'Content',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['content'];
                        }
                        return 'No Records';
                    }
                },
                {
                    name: 'target_link',
                    title: 'Target Link',
                    data: function (row) {

                        if (typeof row.get_slider_item[0] != 'undefined') {
                            return row.get_slider_item[0]['target_link'];
                        }
                        return 'No Records';
                    }
                },

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
         * Drawing The Table
         */


        self.table.on('draw', function () {
            $('.dropdown-toggle').dropdown();

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
                json.data[index].edit = '<a href="/sliderItem/create/' + item.id + '/TR/' + item.group_id + '" class="btn btn-info btn-sm " target="_blank"><i class="fas fa-pen"></i></a>';
                json.data[index].delete = `
                    <form method="post" action="/sliderItem/delete/${item.id}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="${csrf}">
                        <button type="submit" class=" btn btn-danger btn-sm ">delete</button>
                    </form>`;
                {
                }
            });

        });


    });

}

export {
    ItemControlTable
}


