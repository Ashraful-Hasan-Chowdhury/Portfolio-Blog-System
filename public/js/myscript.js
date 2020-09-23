$(document).ready(function() {

    $('#PostTitle').keyup(
        function() {
            var title = $('#PostTitle').val();
            var res = title.replace(/ /g, "-");
            $('#PostSlug').val(res);
        }
    );

    $('#cname').keyup(
        function() {
            var title = $('#cname').val();
            var res = title.replace(/ /g, "-");
            $('#cslug').val(res);
        }
    );

    $('#tname').keyup(
        function() {
            var title = $('#tname').val();
            var res = title.replace(/ /g, "-");
            $('#tslug').val(res);
        }
    );

});
