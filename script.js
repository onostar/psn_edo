//animations on scroll
window.onscroll = function(){changeHeader(),
    showAbout(), displayTotop(), showServices(), showMembers(), displayPopular();
}
/* change header */
function changeHeader(){
    if(document.body.scrollTop > 35 || document.documentElement.scrollTop > 35){
        document.getElementById('mainHeader').className = 'new_header';
        /* document.getElementById('h1').style.width = '15%'; */
        /* document.querySelector('.logo').className = 'new-logo'; */
    }
    else{
        document.getElementById('mainHeader').className = 'main_header';
        /* document.getElementById('h1').style.width = '25%'; */
        /* document.querySelector('.logo').className = 'logo'; */
    }
}
/* show about */
function showAbout(){
    if(document.body.scrollTop > 40 || document.documentElement.scrollTop > 40){
        document.getElementById('about_us').style.display= 'flex';
        
    }
    else{
        document.getElementById('about_us').style.display= 'none';
        
    }
}
/* show gallery */
function showMembers(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.getElementById('why_choose').style.display= 'flex';
        
    }
    else{
        document.getElementById('why_choose').style.display= 'none';
        
    }
}
/* show mission and members */
function showServices(){
    if(document.body.scrollTop > 1200 || document.documentElement.scrollTop > 1200){
        document.getElementById('services').style.display= 'block';
        
    }
    else{
        document.getElementById('services').style.display= 'none';
        
    }
}
/* submit appointment form */
/* $(document).ready(function(){
    $("#book").click(function(){
        let customer_name = document.getElementById("customer_name").value;
        let customer_phone = document.getElementById("customer_phone").value;
        let customer_mail = document.getElementById("customer_mail").value;
        let service = document.getElementById("service").value;
        let appointment_date = document.getElementById("appointment_date").value;
        let appointment_address = document.getElementById("appointment_address").value;
        let notes = document.getElementById("notes").value;
        // alert(notes);

        $.ajax({
            type: "POST",
            url: "appointment.php",
            data: {customer_name:customer_name, customer_phone:customer_phone, customer_mail:customer_mail, service:service, appointment_date:appointment_date, appointment_address:appointment_address, notes:notes},
            success: function(response){
                $(".result").html(response);
            }
        });
        // $(".appointment_page").show();
        return false;
    })
}) */

//display home page after intro
/* setTimeout(function(){
    $(".main").show();
    $(".loader").hide();
}, 3000) */
//display login on desktop page
$(document).ready(function(){
    $("#loginDiv").click(function(){
        $(".login_option").toggle();
        // alert("work");
    });
    
});
/* get hotels from upload payment form */
function showHotels(hotel){
    if(hotel == "yes"){
        document.getElementById("hotels").style.display = "block";
    }else{
        document.getElementById("hotels").style.display = "none";
    }
}
/* toggle message buttons */
$(document).ready(function(){
    $("#broadcastbtn").click(function(){
        $("#brd_mess").show();
        $("#single_mess").hide();
    })
})
$(document).ready(function(){
    $("#indbtn").click(function(){
        $("#brd_mess").hide();
        $("#single_mess").show();
    })
})
/* send broadcast message without refresh */
$(document).ready(function(){
    $("#send_broadcast").click(function(){
        let subject = document.getElementById("subject").value;
        let broadcast_message = document.getElementById("broadcast_message").value;
        // alert(search);
         $.ajax({
            type : "POST",
            url : "../controller/send_broadcast.php",
            data: {subject:subject, broadcast_message:broadcast_message},
            success: function(response){
                $(".info").html(response);
                $("#dashboard").hide();
            }
        })
        return false;
    })
})
/* send individual message without refresh */
$(document).ready(function(){
    $("#send_ind").click(function(){
        let recipient = document.getElementById("recipient").value;
        let ind_subject = document.getElementById("ind_subject").value;
        let ind_message = document.getElementById("ind_message").value;
        // alert(search);
         $.ajax({
            type : "POST",
            url : "../controller/send_ind_mess.php",
            data: {ind_subject:ind_subject, ind__message:ind_message, recipient:recipient},
            success: function(response){
                $(".info").html(response);
                $("#dashboard").hide();
            }
        })
        return false;
    })
})
/* view notification */
function viewMessage(not_id){
    window.open("notifications.php?message="+not_id, "_blank");
    return;
}
/* search slip by date without refresh */
$(document).ready(function(){
    $("#tdate").on("change", function(){
        let tdate = $(this).val();
        if(tdate){
            // alert(search);
            $.ajax({
                type : "POST",
                url : "../controller/search_slip.php",
                data: {tdate:tdate},
                success: function(response){
                    $(".slip").html(response);
                    $("#dashboard").hide();
                }
            })
            return false;
        }else{
            $("#tdate").html("<option>Select year please</option>");
        }
        
    })
})
/* search approved members by year */
$(document).ready(function(){
    $("#admin_tdate").on("change", function(){
        let admin_tdate = $(this).val();
        if(admin_tdate){
            // alert(search);
            $.ajax({
                type : "POST",
                url : "../controller/search_approved.php",
                data: {admin_tdate:admin_tdate},
                success: function(response){
                    $(".approvedMembers").html(response);
                    $("#dashboard").hide();
                }
            })
            return false;
        }else{
            $("#admin_tdate").html("<option>Select year please</option>");
        }
        
    })
})
/* update profile withour refreshing page */
/* $(document).ready(function(){
    $("#searchBtn").click(function(){
        let search = document.getElementById("search_items").value;

        $.ajax({
            type : "POST",
            url : "../controller/search_result.php",
            data: {search:search},
            success: function(response){
                $(".allResults").html(response);
                $("#dashboard").hide();
            }
        })
        return false;
    })
}) */
/* new way to toggle different menu on the page */
function showPage(page){
    //hide all pages when one displays
    document.getElementById("dashboard").style.display = "none";
    // document.getElementById("summaryReports").style.display = "none";
    document.querySelectorAll('.displays').forEach(div =>{
        div.style.display = "none";
    });
    document.querySelector(`#${page}`).style.display = "block";
}
//make links clickable to get to its respective page
document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".page_navs").forEach(navs => {
        navs.onclick = function(){
            showPage(this.dataset.page);
            $("#paid_receipt").hide();
        }
    })
})
// display login on mobile
$(document).ready(function(){
    $("#mobile_log #loginDiv").click(function(){
        $("#mobile_log .login_option").toggle();
        // console.log("Working");
    }); 
});

/* display mobile menu */
$(document).ready(function(){
    $(".menu_icon").click(function(){
        $("#mobile_menu").toggle();
    });
    $("#banner, main, #existence, #hero #mission_vision").click(function(){
        $("#mobile_menu").hide();
        
    })
})
/* display mobile menu for backend*/
$(document).ready(function(){
    $(".menu_icon").click(function(){
        $(".mobile_menu").toggle();
    });
    $("#contents").click(function(){
        $(".mobile_menu").hide();
        
    })
})


//display appointment form
$(document).ready(function(){
    $(".appointment").click(function(){
        $(".appointment_page").show();
    });
    $("#close").click(function(){
        $(".appointment_page").hide();
    })
})
//show item information
function showItems(item_id){
    window.open("item_info.php?item="+item_id, "_parent");
    return;
}

//add item to cart
/* $(document).ready(function(){
    $("#add_to_cart").click(function(){
        let cart_item_name = document.getElementById('cart_item_name').value;
        let cart_item_price = document.getElementById('cart_item_price').value;
        let cart_item_restaurant = document.getElementById('cart_item_restaurant').value;
        let customer_email = document.getElementById('customer_email').value;
        
        
        //   alert("work");
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: {cart_item_name:cart_item_name, cart_item_price:cart_item_price, cart_item_restaurant:cart_item_restaurant,customer_email:customer_email},
            success: function(response){
                $(".info").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        // return false;
    // })

// }) */

//display update user details by clicking on edit address
$(document).ready(function(){
    $("#editDetails").click(function(){
        // alert('hello');
        $(".update_details").show();
        $(".profile_details").hide();
        $("#close_update").click(function(){
            $(".profile_details").show();
            $(".update_details").hide();
        })
    })
})
//display change password
$(document).ready(function(){
    $("#changePasword").click(function(){
        // alert('hello');
        $(".change_password").toggle();
       
    })
})

/* view slip */
function viewUser(user){
    window.open("user_profile.php?user="+user, "_blank");
    return;
}
/* view articles / news */
function viewArticle(article){
    window.open("article.php?article="+article, "_blank");
    return;
}
//multiply item on shopping cart
/* function getCartTotal(){
    let itemTotal = document.getElementById("itemTotal").innerText;
    let discount = document.getElementById("discount").innerText;
    let delivery = document.getElementById("delivery").innerText;
    let grandTotal = document.getElementById("grandTotal");
    grandTotal.innerText = parseInt(itemTotal) + parseInt(discount) + parseInt(delivery);
    // alert(delivery);
}
getCartTotal();

//delete item from cart
function removeCartItem(cart_id){
    let remove_item = confirm("Do you want to remove this item from cart?");
    if(remove_item){
        window.open('remove_cart_item.php?cart_item='+cart_id, '_parent');
        return;
    }
    
}
 */
//hide suuccess message
// setTimeout()
//get total amount of items in cart
/* function cartItemTotal(){
    let totalPrice = document.querySelectorAll('.totalprice');

} */
// close error pop up box from cart
$(document).ready(function(){
    $("#close_error").click(function(){
        $(".error_box").hide();
    })
})

/* //display featured items on scroll
function displayFeatured(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.getElementById("featured").style.display = "block";
    }else{
        document.getElementById("featured").style.display = "none";
    }
}
//display shop items on scroll
function displayAllItems(){
    if(document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000){
        document.getElementById("all_items").style.display = "block";
    }else{
        document.getElementById("all_items").style.display = "none";
    }
}
//display popular items on scroll
function displayPopular(){
    if(document.body.scrollTop > 500 || document.documentElement.scrollTop > 500){
        document.getElementById("popular").style.display = "block";
    }else{
        document.getElementById("popular").style.display = "none";
    }
}
 */
//display mission and vision on scroll
/* function displayMission(){
    if(document.body.scrollTop > 500 || document.documentElement.scrollTop > 500){
        document.getElementById("mission_vision").style.display = "block";
    }else{
        document.getElementById("mission_vision").style.display = "none";
    }
} */

//display to top button{
function displayTotop(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.querySelector(".toTop").style.display = "block";
    }else{
        document.querySelector(".toTop").style.display = "none";
    }
}

//view notification details
function viewNotification(notify_id){
    window.open("not_details.php?notify_id="+notify_id, "_parent");
    return;
}
/* $(document).ready(function(){
    $("#subscribe").click(function(){
        let subscribe_email = document.getElementById("subscribe_email").value;
        alert(subscribe_email);
        /* $.ajax({
            type: "POST",
            url: "subscribe.php",
            data: {subscribe_email:subscribe_email},
            success: function(response){
                $(".result").html(response);
            }
        }) 
        return false;
    })
    
}) */

/* show registration page on click of not a member */
function showForm(form){
    let pages = document.querySelectorAll(".reg_form form");
    pages.forEach(function(page){
        page.style.display = "none";
    })
    document.querySelector(`#${form}`).style.display = "block";
}
document.addEventListener("DOMContentLoaded", function(){
    let btns = document.querySelectorAll(".btns");
    btns.forEach(function(btn){
        btn.addEventListener("click", function(){
            showForm(this.dataset.form);
        })
    })
})
/* search all members */
$(document).ready(function(){
    let $row = $('#result_table tbody tr');
    $('#searchMenus').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search payment confirmation */
$(document).ready(function(){
    let $row = $('#payment_table tbody tr');
    $('#searchPayments').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search approved members */
$(document).ready(function(){
    let $row = $('#approved_table tbody tr');
    $('#searchApproved').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search declined paymenst */
$(document).ready(function(){
    let $row = $('#declined_table tbody tr');
    $('#searchDeclined').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* approve payments */
function approvePayment(pay_id){
    window.open("../controller/approve_payment.php?user="+pay_id, "_parent");
    return;
}
/* decline payment */
function declinePayment(pay_id){
    window.open("../controller/decline_payment.php?user="+pay_id, "_parent");
    return;
}
/* download members to excel */
$(document).ready(function(){
    
    $("#download_members").click(function(){
        /* alert ("yea"); */
        $("#result_table").table2excel({
            filename: "PSN_registered_members.xls"
        });
    })
})
/* download approved members to excel */
$(document).ready(function(){
    
    $("#download_approved").click(function(){
        /* alert ("yea"); */
        $("#payment_table").table2excel({
            filename: "PSN_Edo_Approved_members.xls"
        });
    })
})
/* download declined members */
$(document).ready(function(){
    
    $("#download_declined").click(function(){
        /* alert ("yea"); */
        $("#declined_table").table2excel({
            filename: "PSN_Edo_declined_members.xls"
        });
    })
})
/* authentication for whatsa number */
function checkNumber(id){
    if(id.length > 11){
        alert("The Number is too long");
        $(id).focus();
        return;
    }else if(id.length < 11){
        alert("The Number is too shorto");
        $(id).focus();
        return;
    }
}

/* display mobile navigation */
function displayMenu(){
    let myMenu = document.getElementById('navigation');
    let closeMenu = document.getElementById("closeMenu");
    let openMenu = document.getElementById("openMenu");
    if(myMenu.style.display === "block"){
        myMenu.style.display = "none";
        openMenu.style.display = "block";
        closeMenu.style.display = "none";
    }
    else{
        myMenu.style.display = "block";
        closeMenu.style.display = "block";
        openMenu.style.display = "none";
    }
}
/* delete project */
function deleteProject(project){
    let delProject = confirm("Do you want to delete this project?", "");
    if(delProject){
        window.open("../controller/delete_event.php?article="+project, "_parent");
    }
}
/* delete photo */
function deletePhoto(photo){
    let delPhoto = confirm("Do you want to delete this photo?", "");
    if(delPhoto){
        window.open("../controller/delete_photo.php?photo="+photo, "_parent");
    }
}
/* play beep sound */
function playBeep(){
    let sound = new Audio('beep-07a.wav');
    sound.autoplay() = true;
    sound.loop = false;
    sound.play();
}
/* show chat icon after 5 seconds */
setTimeout(function(){
    $("#chat").show();
    playBeep();
}, 2000);