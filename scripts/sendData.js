$(document).ready(function() {
    $( 'form' ).submit(function( event ) {
        event.preventDefault();
        let mess = $(this).find('.mess');

       if ($(this).attr("id") === "commentForm"){
           $.ajax({
               type : "POST",
               url : 'commentsForm.php',
               data : $(this).serialize(),
               dataType : "html",
               cache : false,
               success : function(data){
                   if (!data){
                       mess.text("Comentariu nu a fost lasat, mesajul nu a fost trimis!");
                       mess.css("display", "block");
                       mess.css("background-color","#b40202");
                   }
                   else{
                       mess.text("Thank you for your comment!");
                       mess.css("display", "block");
                       mess.css("background-color","#42fc35");
                   }
               }
           });
       }

        if ($(this).attr("id") === "contactForm"){
            $.ajax({
                type : "POST",
                url : 'contactsForm.php',
                data : $(this).serialize(),
                dataType : "html",
                cache : false,
                success : function(data){
                    if (!data){
                        mess.text("Ups ceva nu sa primit!)");
                        mess.css("display", "block");
                        mess.css("background-color","#b40202");
                    }
                    else{
                        mess.text("Multumim ca n-ai contactat!");
                        mess.css("display", "block");
                        mess.css("background-color","#42fc35");
                    }
                }
            });
        }

        if ($(this).attr("id") === "subsForm"){
            $.ajax({
                type : "POST",
                url : 'subscribeForm.php',
                data : $(this).serialize(),
                dataType : "html",
                cache : false,
                success : function(data){
                    if (!data){
                        mess.text("Ups ceva nu sa primit!)");
                        mess.css("display", "block");
                        mess.css("background-color","#b40202");
                    }
                    else{
                        mess.text("Multumim ca ai ales sa fii cu noi!");
                        mess.css("display", "block");
                        mess.css("background-color","#42fc35");
                    }
                }
            });
        }
    });
});