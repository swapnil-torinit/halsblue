//var base_url  = "http://localhost/halsblue/";

var base_url  = "https://www.hals.blue/hbo/";

//var base_url  = "http://103.21.58.10/~halsb48s/hbo/";

    // $("#pay_record").submit(function(event){
    //     var txt_all_selected_value = $('#txt_all_selected_value').val();
    //     if(txt_all_selected_value == ''){
    //         alert("Please select any invoice before make paymant.");
    //         return false;
    //     }
    //     else{
    //         var confirm_val =  confirm("Are you sure you want to payment this?");
    //         if(confirm_val == false){
    //            event.preventDefault();  
    //         }  
    //         else{
    //             var max_amount_pay = $("#min_amount_pay").val(); 
    //            // alert(max_amount_pay) ;
    //             var pay_amount = $("#paid_amount").val();  
    //             console.log('check'+max_amount_pay+'paying'+pay_amount);
    //             if(parseInt(pay_amount)>parseInt(max_amount_pay)){
    //                 alert(" You cannot make payment greater then total balance.");
    //                return false;
    //             }

    //             var pay_remark = $('#pay_remark').val();
    //             // if(pay_remark == ''){
    //             //     alert("Remark can not be empty.");
    //             //     return false;
    //             // }
                
    //             //event.preventDefault();                 
    //         }
    //     }
    //     //return false;
    // }); 
    $("#pay_record").submit(function(event){
        var txt_all_selected_value = $('#txt_all_selected_value').val();
        if(txt_all_selected_value == ''){
            alert("Please select any invoice before make paymant.");
            return false;
        }
        else{
            
            var pay_amount = $("#paid_amount").val(); 
            if(pay_amount==0){
               alert("Payment amount can not be 0.");
               return false;
            }else{
                var max_amount_pay = $("#min_amount_pay").val(); 
                console.log('check'+max_amount_pay+'paying'+pay_amount);
                if(parseInt(pay_amount)>parseInt(max_amount_pay)){
                    alert(" You cannot make payment greater then total balance.");
                   return false;
                }
                var pay_remark = $('#pay_remark').val();           
            }
            var confirm_val =  confirm("Are you sure you want to payment this?");
            if(confirm_val == false){
               event.preventDefault();  
            } 
        }
    }); 

  function get_selected_row(selected_row_val){     
    var txt_all_selected_value = $('#txt_all_selected_value').val();
    if(txt_all_selected_value == ''){     
      $('#txt_all_selected_value').val(selected_row_val);    

      var txt_total_cost = $("#txt_total_cost_"+selected_row_val).val();
      $("#min_amount_pay").val(txt_total_cost);  
      $("#pay_amount").val(txt_total_cost);  
    }
    else{     
      var select_all = $('#select_all_'+selected_row_val).prop('checked');
      if(select_all == true){                 
        var old_val = txt_all_selected_value  + "," + selected_row_val;
        $('#txt_all_selected_value').val(old_val); 

          var txt_total_cost = $("#txt_total_cost_"+selected_row_val).val();
          var min_amount_pay = $("#min_amount_pay").val();
          var amt = parseFloat(txt_total_cost) + parseFloat(min_amount_pay);

          $("#min_amount_pay").val(amt); 
          $("#pay_amount").val(amt); 
      } 
      else{         
        var txt_all_selected_value_split = txt_all_selected_value.split(",");
        var txt_all_selected_value_len = txt_all_selected_value_split.length;
        var new_val = '';
        var txt_total_cost = 0;
        for(i=0; i<txt_all_selected_value_len; i++){
          if(txt_all_selected_value_split[i] == selected_row_val){             
          }
          else{ 
            if(new_val == ''){
              new_val = txt_all_selected_value_split[i];  
              var txt_total_cost = $("#txt_total_cost_"+txt_all_selected_value_split[i]).val();
            }
            else{
              var new_val = new_val  + "," + txt_all_selected_value_split[i];
              var txt_total_cost = parseFloat(txt_total_cost) + parseFloat($("#txt_total_cost_"+txt_all_selected_value_split[i]).val());
            }            
          }

        }
        $('#txt_all_selected_value').val(new_val);  
        $("#min_amount_pay").val(txt_total_cost);  
        $("#pay_amount").val(txt_total_cost);  
      }
    }
  }  

$("#due_dt").change(function(){    
    var invoice_due_date = $(this).val();    
    var customer_id = $("#customer_id").val();
    if(invoice_due_date == ""){
        alert("Please select any Due date.");               
        return false;
    }
    else{
        $('#invoice_data').html("");
        $('#txt_all_selected_value').val("");
        $('#min_amount_pay').val("");
        $('#pay_amount').val("");
        $("#pay_data").hide();
         $.ajax({
          type: "post",
          url: base_url+"pay/get_invoice_due_date",
          cache: false,    
          data: "invoice_due_date="+invoice_due_date+"&customer_id="+customer_id,
          success: function (data) {   
                var obj = JSON.parse(data);                 
                if(obj["status"] == "success"){
                    $("#pay_data").show();
                    $('#invoice_data').html(obj["invoice_data"]);
                }
                else{
                    alert(obj["message"]);
                    return false;
                }                
            },
          error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
         });
    }
});

$("#get_product_report").click(function(){    
    var invoice_to = $("#invoice_to").val();    
    var invoice_from = $("#invoice_from").val();
    var product_id = $("#product_id").val();    
    
    $('#tbody_product_report').html("");
     $.ajax({
      type: "post",
      url: base_url+"report/get_product_report",
      cache: false,    
      data: "invoice_to="+invoice_to+"&invoice_from="+invoice_from+"&product_id="+product_id,
      success: function (data) {   
            var obj = JSON.parse(data);                 
            if(obj["status"] == "success"){
                $('#tbody_product_report').html(obj["report_data"]);
                $('#tbody_product_report').append(obj["csv_data"]);
            }
            else{
                alert(obj["message"]);
                return false;
            }                
        },
      error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
     });    
});

$("#get_customer_report").click(function(){    
    var invoice_to = $("#invoice_to").val();    
    var invoice_from = $("#invoice_from").val();
    var customer_id = $("#customer_id").val();    
    
    $('#tbody_customer_report').html("");
     $.ajax({
      type: "post",
      url: base_url+"report/get_customer_report",
      cache: false,    
      data: "invoice_to="+invoice_to+"&invoice_from="+invoice_from+"&customer_id="+customer_id,
      success: function (data) {   
            var obj = JSON.parse(data);                 
            if(obj["status"] == "success"){
                $('#tbody_customer_report').html(obj["report_data"]);
                $('#tbody_customer_report').append(obj["csv_data"]);
            }
            else{
                alert(obj["message"]);
                return false;
            }                
        },
      error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
     });    
});

$("#get_invoice_report").click(function(){    
    var invoice_to = $("#invoice_to").val();    
    var invoice_from = $("#invoice_from").val();    
    
    $('#tbody_invoice_report').html("");
     $.ajax({
      type: "post",
      url: base_url+"report/get_invoice_report",
      cache: false,    
      data: "invoice_to="+invoice_to+"&invoice_from="+invoice_from,
      success: function (data) {   
            var obj = JSON.parse(data);                 
            if(obj["status"] == "success"){
                $('#tbody_invoice_report').html(obj["report_data"]);
                $('#tbody_invoice_report').append(obj["csv_data"]);
            }
            else{
                alert(obj["message"]);
                return false;
            }                
        },
      error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
     });    
});


$("#get_invoice").click(function(){    
    //var product_id = $("#product_id").val();    
    var customer_id = $("#customer_id").val();    
    if(customer_id == ""){
        alert("Please select any customer.");               
        return false;
    }
    else{
        $('#invoice_table').html("");
        $('#cust_data').html("");
        $("#pay_data").hide();
         $.ajax({
          type: "post",
          url: base_url+"payment/get_invoice",
          cache: false,    
          data: "customer_id="+customer_id,
          success: function (data) {   
                var obj = JSON.parse(data);                 
                if(obj["status"] == "success"){
                    $("#pay_data").show();
                    $('#cust_data').html(obj["customers_data"]);
                    $('#invoice_table').html(obj["invoice_data"]);
                }
                else{
                    alert(obj["message"]);
                    return false;
                }                
            },
          error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
         });
    }
});


$("#prdaddinstant").click(function(){    
    var product_id = $("#product").val(); 
    var pr_price = $("#pr_price").val();    
    $("#current_product_id").val(product_id);

    var quantity = $("#qty").val(); 
    var pr_price = $("#pr_price").val();    
    var state_id = $("#state_id").val();    

    var is_chk = $("#chk_invoice").is(':checked');        
    if(is_chk == true){
        var customer_id = "";    
    }    
    else{
        var customer_id = $("#invoice_customer_id").val();            
    }

  if(product_id == "" || state_id == "" || pr_price=='0'){
        if(product_id == ""){
            alert("Please select any product.");
        }
        else if(state_id == ""){
            alert("Please select any State.");           
        } 
        if(pr_price=='0')
        {
          alert('Price not loaded yet!!');
        }       
        return false;
    }
    else{
         $.ajax({
          type: "post",
          url: base_url+"common/getproductcart",
          cache: false,    
         // data: { get_param: 'value' }, 
          data: $('#validate_instantinvoice').serialize()+"&customer_id="+customer_id+"&pr_price="+pr_price,            
            success: function (data) {                     
                var names = data;
                //$('#instantcart').html(data);
          var obj = JSON.parse(data);             
          if(obj['status']==false)
               {  
                alert('Product already in Cart!');

                return;
               }
                var total_tax = obj['tax_amount'];
                var total_cost = obj['total_cost'];
                //alert("--total_tax--"+total_tax+"--total_cost-"+total_cost);

                var start_val = $("#start_val").val();                    
                var all_pro = $("#all_pro").val();   
                if(all_pro == ""){
                    $("#all_pro").val(product_id);
                }
                else{                    
                    $("#all_pro").val(all_pro+","+product_id);   
                }
                
                $('#product_id option[value="'+product_id+'"]').remove();  
          $('#fill_val').append('<tr id="tr_pro_'+product_id+'"><td>'+obj['title']+'</td><td>'+obj['sku']+'</td><td>'+quantity+'</td><td>'+obj['price']+'</td><td>'+obj['taxable_value']+'</td><td>'+obj['cgst']+'%</td><td>'+obj['cgst_amount']+'</td><td>'+obj['sgst']+'%</td><td>'+obj['sgst_amount']+'</td><td>'+obj['igst']+'%</td><td>'+obj['igst_amount']+'</td><td><input type="hidden" name="atax_amount_'+product_id+'" id="atax_amount_'+product_id+'" value="'+obj['tax_amount']+'" />'+obj['tax_amount']+'</td><td><input type="hidden" name="atotal_cost_'+product_id+'" id="atotal_cost_'+product_id+'" value="'+obj['total_cost']+'" />'+obj['total_cost']+'</td><td><img onclick="remov_cart('+product_id+', '+"'"+obj['title']+"'"+');" src="'+base_url+'resources/img/0.png" alt="Remove" title="Remove" /></td></tr>');
            
            var tax_amount_old = $('#tax_amount').val();
            var total_price_old = $('#total_price').val();
                            //alert("--tax_amount_old--"+tax_amount_old+"--total_price_old-"+total_price_old);


            var tax_amount_new = parseFloat(tax_amount_old) + parseFloat(total_tax);
            var total_price_new = parseFloat(total_price_old) + parseFloat(total_cost);

            var tax_amount_fixed = tax_amount_new.toFixed(2);
            var total_price_fixed = total_price_new.toFixed(2);
                            //alert("--tax_amount_fixed--"+tax_amount_fixed+"--total_price_fixed-"+total_price_fixed);


            $('#tax_amount').val(tax_amount_fixed);
            $('#total_price').val(total_price_fixed);
                $("#start_val").val(parseInt(start_val)+1);
                $("#current_product_id").val("");
            //  $("#product").remove(product_id).trigger('change');
              

              //Clear VAlues:
             
              $("#qty").val('1');
              $("#pr_price").val('0');
              


            },
          error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
         });
    }
});

$(document).ready(function(){ 
    //$("[id^=select_]").click(function(){  
    //alert("test");  
        //var auction_id = $(this).attr("auction_id");
    //});    

    $("input[name$='product_type']").click(function() {
        var product_type = $(this).val();
        if(product_type == 0){
            $("#div_variation").hide();            
            $("#add_div_variation").hide();                        
        }
        else{
            $("#div_variation").show();            
        }
    });

    $("#get_car_model").change(function(){
        var car_make_id = $(this).val();                        
        $.ajax({
            type: "post",
            url: base_url+"product/get_car_model",
            cache: false,    
            data: "car_make_id="+car_make_id,     
            success: function(data){                                        
                var obj = JSON.parse(data);                    
                if(obj['status'] == "success"){                        
                    $('#car_model_id').html(obj["model_val"]);                    
                }
                else{
                    //alert(obj['message']);                        
                }                    
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(xhr.status);
                //alert(thrownError);
            }
        });
    });

    $("#add_variation").click(function(){
        var variations_id = $("#variations_id").val();        
        $("#add_div_variation").hide();                        
        $.ajax({
            type: "post",
            url: base_url+"product/getvariations",
            cache: false,    
            data: "variations_id="+variations_id,     
            success: function(data){                                        
                var obj = JSON.parse(data);                    
                if(obj['status'] == "success"){ 
                    $("#add_div_variation").show();                        
                    $("#add_div_variation").html(obj["variations_data"]);                        
                }
                else{
                    $("#add_div_variation").html("");                        
                }                    
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(xhr.status);
                //alert(thrownError);
            }
        });
    });

    $("#chk_invoice").click(function(){
        var is_chk = $("#chk_invoice").is(':checked');        
        if(is_chk == true){
            //$("#chk_invoice").val(1);
            $("#payment_mode").html('<option value="Cash">Cash</option>');
            $("#div_customer_id").hide();
            $("#customer_name").removeAttr("readonly");
            $("#customer_address").removeAttr("readonly");
            $("#customer_address2").removeAttr("readonly");
            $("#place_supply").removeAttr("readonly");
            $("#customer_email").removeAttr("readonly");
            $("#customer_mobile").removeAttr("readonly");
            $("#state_id").removeAttr("readonly");

            $("#customer_name").val("");
            $("#customer_address").val("");
            $("#customer_email").val("");
            $("#customer_mobile").val("");
            $("#state_id").val("");
            
        }
        else{
            //$("#chk_invoice").val(0);
            $("#payment_mode").html('<option value="Credit">Credit</option><option value="Cash">Cash</option>');
            $("#div_customer_id").show();
            $("#customer_name").attr("readonly", "readonly");
            $("#customer_address").attr("readonly", "readonly");
            $("#customer_email").attr("readonly", "readonly");
            $("#customer_mobile").attr("readonly", "readonly");
            $("#state_id").attr("readonly", "readonly");
        }        
    });

    $("#invoice_customer_id").change(function(){
        var customer_id = $(this).val();                                   
        $.ajax({
            type: "post",
            url: base_url+"invoice/get_customer_data",
            cache: false,    
            data: "customer_id="+customer_id,     
            success: function(data){                                        
                var obj = JSON.parse(data);                    
                
                if(obj['status'] == "success"){                     
                    $("#customer_name").val(obj["customer_name"]);                        
                    $("#customer_address").val(obj["customer_address"]); 
                    $("#customer_address2").val(obj["customer_address2"]); 
                    $("#place_supply").val(obj["place_supply"]);   
                        
                    $("#customer_email").val(obj["customer_email"]);    
                    $("#customer_mobile").val(obj["customer_mobile"]);                        
                    $("#state_id").val(obj["state_id"]);             

                    $("#all_pro").val("");
                    $('#fill_val').html("");    
                    $("#tax_amount").val("0");
                    $("#total_price").val("0");
                                 
                }
                else{
                    $("#customer_name").val("");                        
                    $("#customer_address").val("");
                    $("#customer_address2").val("");                        
                    $("#customer_email").val("");                        
                    $("#customer_mobile").val("");                        
                    $("#state_id").val("");                        
                }                    
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(xhr.status);
                //alert(thrownError);
            }
        });
    });
});


//$('html, body').animate({ scrollTop: $('#validate_submit_bid').offset().top }, 'slow');  

// Javascript Document

$(document).ready(function() {  
    $('#validate_instantinvoice').validate({                
        rules: {                
            invoice_customer_id: {
                required: true,
            },   
            invoice_date: {
                required: true,
            },   
            // customer_name: {
            //     required: true,
            // },   
            // customer_address: {
            //     required: true,
            // },   
                      
            // customer_mobile: {
            //     required: true,
            //     minlength: 10,
            //     digits: true
            // },   
            state_id: {
                required: true,
            },   
            payment_mode: {
                required: true,
            },   
        },
        messages: {                            
        },
        submitHandler: function (form) {
            var all_pro = $("#all_pro").val();
            if(all_pro == ""){
                alert("Please select any product.");
                return false;
            }
            form.submit();
        }
    }); 

    $('#validate_setting').validate({                
        rules: {                
            state_id: {
                required: true,
            },   
            name: {
                required: true,
            },   
            address: {
                required: true,
            },   
            notification_email: {
                required: true,
                email: true,
            },               
        },
        messages: {                            
        },
        submitHandler: function (form) {            
            form.submit();
        }
    }); 

    $('#validate_payment').validate({                
        rules: {                
            customer_id: {
                required: true,
            },   
                          
        },
        messages: {                            
        },
        submitHandler: function (form) {            
            form.submit();
        }
    }); 
}); 


    function get_auto_suggest(product_id, product_name){
        $("#current_product_id").val(product_id);
        $("#livesearch").html("");
        document.getElementById("livesearch").style.border="0px";       
        $("#product").val(product_name);
    }

    function remov_cart(product_id, product_name){        
        var atotal_cost = $("#atotal_cost_"+product_id).val();
        var atax_amount = $("#atax_amount_"+product_id).val();
        
        var tax_amount = $("#tax_amount").val();
        var total_price = $("#total_price").val();

        var sum_tax_amount = parseFloat(tax_amount) - parseFloat(atax_amount);
        var sum_total_price = parseFloat(total_price) - parseFloat(atotal_cost);

        var sum_tax_amount_fixed = sum_tax_amount.toFixed(2);
        var sum_total_price_fixed = sum_total_price.toFixed(2);


        $.ajax({
            type: "post",
            url: base_url+"invoice/remove_cart",
            cache: false,    
            data: "product_id="+product_id,     
            success: function(data){                                        
                var obj = JSON.parse(data);                    
                if(obj['status'] == "success"){                        
                    $("#tr_pro_"+product_id).remove();  
                    $("#product_id").append('<option value="'+product_id+'">'+product_name+'</option>');                    

                    var txt_all_selected_value = $("#all_pro").val();
                    if(txt_all_selected_value != ""){        
                      var txt_all_selected_value_split = txt_all_selected_value.split(",");
                      var txt_all_selected_value_len = txt_all_selected_value_split.length;
                      var new_val = '';
                      for(i=0; i<txt_all_selected_value_len; i++){
                        if(txt_all_selected_value_split[i] == product_id){             
                        }
                        else{ 
                          if(new_val == ''){
                            new_val = txt_all_selected_value_split[i];  
                          }
                          else{
                            var new_val = new_val  + "," + txt_all_selected_value_split[i];
                          }            
                        }
                      }
                      $('#all_pro').val(new_val);  
                    }
    


                    $("#tax_amount").val(sum_tax_amount_fixed);  
                    $("#total_price").val(sum_total_price_fixed);  
                }
                else{
                    alert(obj['message']);                        
                }                    
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(xhr.status);
                //alert(thrownError);
            }
        });
    }


function showResult(str){    
    $("#current_product_id").val("");
    var all_pro = $("#all_pro").val();

    if (str.length==0){
        $("#livesearch").html("");
        document.getElementById("livesearch").style.border="0px";
        return;
    }

    $.ajax({
        type: "post",
        url: base_url+"invoice/livesearch",
        cache: false,    
        data: "str="+str+"&all_pro="+all_pro,     
        success: function(data){                                        
            var obj = JSON.parse(data);                    
            $("#livesearch").html(obj["sdata"]);
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";                               
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //alert(xhr.status);
            //alert(thrownError);
        }
    });
}

function updateinventory(pid)
{
    var qty = $("#add_qty"+pid).val();
    var rem = $("#logremarks").val();

    //alert(qty+'-'+pid);

    $.ajax({
        type: "post",
        url: base_url+"stock/updateinventory",
        cache: false,    
        data: "pid="+pid+"&qty="+qty+"&remarks="+rem,     
        success: function(data){                                        
            var obj = JSON.parse(data);      
            $("#current_qty"+pid).attr('value',obj.newqty);
            $("#add_qty"+pid).attr("disabled",'disabled');              
            $("#status"+pid).append(obj.msg);
                                          
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            //alert(thrownError);
        }
    });
}
function checkinvoice(inid)
{
    $.ajax({
        type: "post",
        url: base_url+"invoice/checkinvoice",
        cache: false,    
        data: "inid="+inid,     
        success: function(data){                                        
            var obj = JSON.parse(data);      
            // $("#current_qty"+pid).attr('value',obj.newqty);
            // $("#add_qty"+pid).attr("disabled",'disabled');              
            $("#inv_status").text(obj.msg);
                                          
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            //alert(thrownError);
        }
    });
}

function validatependingInvoices(){

}

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  alert('Text Copied. Use Cntrl+V to paste')
}

function getproductprice(id)
{
  var is_chk = $("#chk_invoice").is(':checked');        
    if(is_chk == true){
        var customer_id = 0;    
    }    
    else{
        var customer_id = $("#invoice_customer_id").val();            
    }
  //  alert(customer_id);
  $.ajax({
        type: "post",
        url: base_url+"invoice/getproductprice",
        cache: false,    
        data: "pid="+id+"&customer_id="+customer_id,     
        success: function(data){                                        
            var obj = JSON.parse(data);                   
            //$("#pr_price").text(obj.price);
            $("#pr_price").val(obj.price);
                                          
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            //alert(thrownError);
        }
    });
  
}
