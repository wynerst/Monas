<script>
  var time  = 0;
  var msg   = '';
  var updateTime = function (cb) {
    $.getJSON("<?php echo site_url()?>/chat/time", function (data) {
      cb(~~data);
    });
  };

  var sendChat = function (message, user, cb) {
    $.getJSON("<?php echo site_url()?>/chat/insert_chat?message=" + message + "&user=" + user, function (data){
      cb();
    });
  }

  var addDataToReceived = function (arrayOfData) {
    arrayOfData.forEach(function (data) {
      msg = '<div class="chat-element">';
      msg += '<a href="#" class="pull-left">';
      msg += '<img alt="image" class="img-circle" src="<?php echo base_url().IMG?>avatar/a1.jpg">';
      msg += '</a>';
      msg += '<div class="media-body">';
      msg += '<small class="pull-right">2h ago</small>';
      msg += '<strong>'+ data[1] +'</strong>';
      msg += '<p class="m-b-xs">' + data[0] + '</p>';
      msg += '<small class="text-muted">' + data[2] + '</small>';
      msg += '</div>';
      msg += '</div>';
      $("#received").html(msg);
    });
  }

  var getNewChats = function () {
    $.getJSON("<?php echo site_url()?>/chat/get_chats?time=" + time, function (data){
      addDataToReceived(data);

      setTimeout(function(){
        $('#received').scrollTop($('#received')[0].scrollHeight);
      }, 0);

      time = data[data.length-1][1];
    });
  }

  $( document ).ready ( function () {
    $("form").submit(function (evt) {
      evt.preventDefault();
      var message = $("#text").val();
      var user    = $("#user").val();
      $("#text").val('');
      sendChat(message, user, function (){
        alert("dane");
      });
    });
  
    setInterval(function (){
      getNewChats(0);
    },1500);
  
  });
</script>

<div class="col-lg-9">
  <div class="panel panel-default">
    <div class="panel-body">
      <div>
        <div class="chat-activity-list" id="received">
        </div>
      </div>
      <div class="chat-form">
        <form role="form" method="post">
          <div class="form-group">
            <textarea class="form-control" name="message" id="text" placeholder="Message"></textarea>
          </div>
          <div class="text-right">
            <input type="hidden" name="user" id="user" value="Eddy Subratha">
            <button type="submit" class="btn btn-sm btn-inverse"><strong>Send message</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3">
  <ul class="list-group text-left">
    <li class="list-group-item"><a href="#">Arif Wicaksono</a> <i class="fa fa-circle text-success pull-right"></i></li>
    <li class="list-group-item text-muted">Hendra Budiman <i class="fa fa-circle text-muted pull-right"></i></li>
    <li class="list-group-item text-muted">Saffiatul Husna <i class="fa fa-circle text-muted pull-right"></i></li>
    <li class="list-group-item text-muted">Robbi Pandana <i class="fa fa-circle text-danger pull-right"></i></li>
    <li class="list-group-item text-muted">Erros Sriwahyu <i class="fa fa-circle text-danger pull-right"></i></li>
  </ul>                
</div>