// $(function() {});
    AdminPost();
    showNotifications();
    setInterval(showNotifications,5000);

    $('#search').on("click",function(){
        seenNotifications();
        // alert("testing")
    })

    $('#nf-btn').on("click",function(e){
        e.stopPropagation();
    })

    $('html').on("click",function(){
        $('#notifications').hide();
    })
    var notifTotal = '';
    // $('#notification').hide();
   
    // $('#nf-btn').on("click",function(){   
    //     $('#notification').toggle();
    //     seenNotifications();
    // })

    // $('#nf-btn').on("click",function(e){
    //     e.stopPropagation();
    // })

    // $('html').on("click",function(){
    //     $('#notification').hide();
    // })


function AdminPost(){
 $.ajax({
            type: "POST",
            url: "/alumnitracer/classes/Controller.php?a=displayadminpost",
            data:{
                key:'displayadminpost',
            },
            cache: false,
            success: function(data){
                var data = JSON.parse(data);
                let contentData = data;    
                if(contentData.length > 0){
                    for(let i = 0; i < contentData.length; i++){
                        let post_details = contentData[i].Details;      
                        let post_TimeStamp = contentData[i].TimeStamp;
                        let post_Title = contentData[i].title;
                         let resultDiv = `
                         <div class="container" style="margin-bottom:1rem;">
    <div class="frame__container">
  <div class="frame__headline">
    <img class="headline__image" src="/alumnitracer/img/AdminPhoto.png">
    <div class="frame__column">
      <p class="headline__title">
       Alumni Tracer Administrator 
      </p>
      <p class="headline__subtitle">
   <br>  <b>Date Posted:</b>${post_TimeStamp}
    </div>
  </div>
  <div class="frame__content">
    <h4>${post_Title}</h4>
    <p class="frame__text--small">${post_details}</p>
  </div>
  <div class="frame__content">
    <!-- <img class="frame__image" src="http://via.placeholder.com/476x476"> -->
  </div>
  <!-- <div class="frame__footer">
    <div class="footer__likes">
      <img class="footer__image" src="http://via.placeholder.com/14x14">
      <p class="text__social">Like</p>
    </div>
    <div class="footer__comments">
      <img class="footer__image" src="http://via.placeholder.com/14x14">
      <p class="text__social">Comment</p>
    </div>
    <div class="footer__share">
      <img class="footer__image" src="http://via.placeholder.com/14x14">
      <p class="text__social">Share</p>
    </div>
    <div class="footer__post-as">
      <img class="footer__post-as-image" src="http://via.placeholder.com/16x16">
    </div>
      <div class="footer__dropdown"></div>
  </div> -->

</div>
</div>
                         
                         `;
                        //  $("#notification").append(resultDiv);
                        // alert("Testing");
                         $("#adminpost").append(resultDiv); 
                       }
                        
                    }
                },
            error: function(xhr, status, error){
                console.error(xhr);
            }
        });
}

function showNotifications(){
        var AlumniEmail = document.getElementById("AlumniEmail").textContent
        // console.log(AlumniEmail);
        $.ajax({
            type: "POST",
            url: "/alumnitracer/notif/fetch.php",
            data:{
                key:'123',
                AlumniEmail:AlumniEmail,
            },
            cache: false,
            success: function(data){
                var data = JSON.parse(data);
                let contentData = data;

                console.log(contentData);

                $('#notification').html('');       
                if(contentData.length > 0){
                    for(let i = 1; i < contentData.length; i++){
                        let noti_date = contentData[i].noti_date;      
                        let noti_seen = contentData[i].notif_seen;
                        let noti_status = contentData[i].noti_status;
                        let noti_table = contentData[i].noti_table;
                        let noti_type = contentData[i].noti_type;
                        let noti_uniqueid = contentData[i].noti_uniqueid;
                        let noti_user_uniqueid = contentData[i].noti_user_uniqueid;
                        let noti_url = contentData[i].noti_url;

                        if (noti_seen == 'unseen' || noti_seen == null){
                            noti_seen = 'success';
                        }else{
                                noti_seen='dark';
                        }
                        
                        if (noti_type == 'survey'){
                            noti_type="You have a new survey to be answered";
                         }
                        
                        
                        
                    let resultDiv = `
                    <a href="/AlumniTracer/Views/Admin/form.php?code=${noti_url}">
                        <div class=" alert  alert-${noti_seen}" role="alert" title="${noti_date}">
                            ${noti_type}
                        </div>
                    </a>
                    `;

                    $("#notification").append(resultDiv);
                        
                    notifTotal = contentData[0].total;
                
                $("#notifCounter").html(contentData[0].total);
                    
                
                if(notifTotal == 0){
                    $("#notifCounter").css({"visibility":"hidden"});
                }
                else{
                  
                    $("#notifCounter").css({"visibility":"visible"});
                }
                  
                    }
                        }else{
                                // $("#notifications").html("<p> No Notifications </p>")
                                $("#notifCounter").css({"visibility":"hidden"});
                            }
                },
            error: function(xhr, status, error){
                console.error(xhr);
            }
        });

}

function seenNotifications(){
    console.log("CLicked")
    $.ajax({
        type:"POST",
        url:"/AlumniTracer/notif/fetch.php",
        data:{
            key: '1234'
        },
        cache:false,
        success:function(data){

        }
    })
}