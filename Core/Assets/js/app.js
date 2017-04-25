$('[name=alertComment]').on('click',function(e){
    var idUser = e.currentTarget.value;
    console.log(idUser);
    $('#post'+ idUser).removeClass("panel-default").addClass("panel-danger");
    $('#alert'+ idUser).slideUp();
    $.ajax({
        url: 'post/addalert/'+ idUser,
        type: 'POST',
        data: 'idPost=' + idUser
    });
});

$('#viewAddComment').on('click' , function (e) {
    $('#viewAddComment').hide("slow");
    $('#addComment').show("slow");
});

$('.btn-response').on('click' , function (e) {
    var comId = e.currentTarget.value;
    $('#addComment').hide("slow");
    $('.addResponseComment').hide("slow");
    $('#viewAddComment').show("slow");
    $('#response' + comId ).show("slow");
});

$('#resetComment').on('click' , function (e) {
    $('#viewAddComment').show("slow")
    $('#addComment').hide("slow");
});

$('[name=closeResponseComment]').on('click' , function (e) {
    $('.addResponseComment').hide("slow");
});

$('.btn-alertValid').on('click' , function (e) {
    var idComment = e.currentTarget.value;
    $('#post'+ idComment).removeClass("panel-danger").addClass("panel-default");
    $('#alertValid'+ idComment).slideUp();
    $('#alertDelete'+ idComment).slideUp();
    $.ajax({
        url: 'post/removealert/'+ idComment,
        type: 'POST',
        data: 'idPost=' + idComment
    });
});

$('.btn-alertDelete').on('click' , function (e) {
    var idComment = e.currentTarget.value;
    $('#post'+ idComment).removeClass("panel-danger").addClass("panel-default");
    $('#alertValid'+ idComment).slideUp();
    $('#alertDelete'+ idComment).slideUp();
    $.ajax({
        url: 'post/deletecommentsalert/'+ idComment,
        type: 'POST',
        data: 'idPost=' + idComment
    });


});

$('#adminBtnNewPost').on('click' , function (e) {
    $('#adminBtnNewPost').hide("slow");
    $('#adminNewPost').show("slow");
});

$('#adminCloseNewPost').on('click' , function (e) {
    $('#adminBtnNewPost').show("slow");
    $('#adminNewPost').hide("slow");
});

$('[name=publication]').on('click' , function (e) {
    var status = e.currentTarget.value;
    var idPost = $(this).attr("id");

    status == '0' ? publish() : unpublish();

    function publish() {
        $('#' + idPost).val('1');
        $('#' + idPost).html(' Depublier');
        $('#' + idPost).toggleClass( "btn-info" );
        $('#' + idPost).toggleClass( "btn-success" );
        $.ajax({
            url: 'admin/posts/publish/',
            type: 'POST',
            data: {
                'idPost': idPost,
                'status': '1'
            }
        })
    }

    function unpublish() {
        $('#' + idPost).val('0');
        $('#' + idPost).html('Publier');
        $('#' + idPost).toggleClass( "btn-info" );
        $('#' + idPost).toggleClass( "btn-success" );
        $.ajax({
            url: 'admin/posts/publish/',
            type: 'POST',
            data: {
                'idPost': idPost,
                'status': '0'
            }
        })
    }

});

$("[id^=modifier]").on('click', function(e){
    var idPost = e.currentTarget.value;
    $.ajax({
        url: 'admin/posts/findjson/' + idPost,
        type : "POST",
        dataType : 'json',
        data: 'idPost=' + idPost,

        success : function(data)
        {
            $( "#updateIdPost" ).val(data['BIL_ID']);
            $( "#UpdateTitrePost" ).val(data['BIL_TITRE']);
            tinyMCE.activeEditor.setContent(data['BIL_CONTENU']);
        },
        error: function(xhr, resp, text)
        {

        }
    })
});

$("[id^=modifierAlert]").on('click', function(e){
    var idAlert = e.currentTarget.value;
    $.ajax({
        url: 'admin/posts/findalertjson/' + idAlert,
        type : "POST",
        dataType : 'json',
        data: 'idAlert=' + idAlert,

        success : function(data)
        {
            $( "#updateidAlert" ).val(data[0]['COM_ID']);
            tinyMCE.activeEditor.setContent(data[0]['COM_CONTENU']);
        },
        error: function(xhr, resp, text)
        {

        }
    })
});