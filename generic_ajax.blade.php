<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<title>Generic Ajax</title>
<input type="text" class="text">
<input type="button" class="btn-primary check" value="test">
<h3> Ajax Response </h3><br>
<b id="res"></b>


<script type="text/javascript">
 
 var Common = {
    Ajax: function (httpmethod, url, data, successCallBack, failureCallBack, async, cache) {

        if (typeof async == "undefined")
            async = true;
        if (typeof cache == "undefined")
            cache = false;

        //var baseUrl = Window.ApplicationPath;

        var defObj = $.ajax({
            type: httpmethod,
            url: "{{{url()}}}"+ url,
            data: data,
            async: async,
            cache: cache,

            success: function (response) {
                try {
                    if (successCallBack)
                        successCallBack(response);
                } catch (err) {
                    console.log(err);
                }
            },
            error: function (err, type, httpStatus) {
                if (failureCallBack)
                    failureCallBack(err, type, httpStatus);
                console.log('Error occurred in ajax call' + err.status + " - " + err.responseText + " - " + httpStatus);
            }
        });

        return defObj;
    },
  }  


$('.check').on('click',function(){ 

     //generciAjax: function() {
        var text = $('.text').val();
        var url = '/ajax/genric_ajax_test';
        var test_data = text;
        var data = { "test_var": test_data };

        Common.Ajax('GET', url, data, function (result) {

            $('#res').html(result);

        }, function (xhr, ajaxOptions, thrownError) {

        });
    //}

});

   


</script>