var nickname = '';
var msg = '';
//当前获取到第几条最新消息的id
var id = 0;
$(function () {
    // $('.chat-box').css('display', 'none');
    $('.start-btn').click(function () {
        nickname = $('#nick').val();
        // console.log(nickname);
    })
    $('.send-btn').click(function () {
        msg = $('#msg').val();
        // console.log(msg);
        sendMsg(msg);
    })
})
function sendMsg(msg){
    $.ajax({
        url:'msg.php',
        type:'post',
        data:'nickname='+nickname+'&msg='+msg,
        success:function(data){
            if(data.code == 0){
                console.log('success',data);
            }
        },
        error:function(response){
            console.log('error',response);
        }
    })
    addMsg(nickname,msg,new Date());
}

function addMsg(nickname,msg,time){
    var html = '';
    html += '<div class="show-box">'
                +'<div class="msg-box">'
                    +'<p class="nickname">'+nickname+ time + '</p>'
                    +'<p class="msg">'+msg+'</p>'
                +'</div>'
            +'</div>';
    $('.show-box').append(html)
}

function getMsg(){
    $.ajax({
        url:'getMsg.php',
        type:'get',
        data:'id='.id,
        success:function(data){
            console.log(data);
        },
        error:function(response){
            console.log(response);
        }
    })
}