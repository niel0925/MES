
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">

    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid"  >
      <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

      <?php
      include_once("../classes/link1.php");
      include_once("../classes/model.php");
      include_once("../classes/line.php");
      include_once("../classes/defectcatprod.php");
      include_once("../classes/defectprod.php");
      $readonly ="readonly";
      $model ="";
      $revision ="";
      $line ="";
      $location ="";
      $status = "";
      $createdby ="";
      $cmbmodel ="";
      $cmbline ="";
      $seq =1;
      $qty1 =0;
      $qty2 =0;
      $qty3 =0;
      $qty4 =0;
      $qtyPT1 = 0;
      $qtyPT2 =0;



      ?>

      <div class="mdl-cell mdl-cell--12-col mdl-cell--6-col-desktop">

     
       <div id = "success" class="alert alert-success alert-dismissible" role="alert" hidden>
        <strong>Success!</strong> Serial <b id="SerialNumber" name="SerialNumber"></b> is successfully updated!</div>
          <div id = "successlink" class="alert alert-success alert-dismissible" role="alert" hidden>
        <strong>Success!</strong> Serial <b id="seriallink" name="seriallink"></b> is successfully Link!</div>
        <div id = "successreject" class="alert alert-success alert-dismissible" role="alert" hidden>
          <strong>Success!</strong> Serial <b id="Serial_Error6" name="Serial_Error6"></b> is successfully rejected!</div>
          <div id = "error" class="alert alert-danger alert-dismissible" role="alert" hidden>
            <strong>Error!</strong> Serial <b id="lblError" name="lblError"></b> already exist!</div>
            <div id = "error1" class="alert alert-danger alert-dismissible" role="alert" hidden>
              <strong>Error!</strong> Serial <b id="Serial_Error1" name="Serial_Error1"></b> already exist!</div>
              <div id = "offroute" class="alert alert-danger alert-dismissible" role="alert" hidden>
                <strong>Error!</strong> <b id="Serial_Error2" name="Serial_Error2"></b></div>
                <div id = "forcardlink" class="alert alert-danger alert-dismissible" role="alert" hidden>
                  <strong>Error!</strong> Serial <b id="Serial_Error3" name="Serial_Error3"></b> is for card linking!</div>
                  <div id = "forlotmaking" class="alert alert-danger alert-dismissible" role="alert" hidden>
                    <strong>Error!</strong> Serial <b id="Serial_Error4" name="Serial_Error4"></b> is for lot making!</div>
                    <div id = "serialreject" class="alert alert-danger alert-dismissible" role="alert" hidden>
                     <strong>Error!</strong> Serial <b id="Serial_Error5" name="Serial_Error5"></b> is REJECT!</div>

                     <div id = "wrongmodel" class="alert alert-danger alert-dismissible" role="alert" hidden>
                       <strong>Error!</strong> Wrong Model!</div>

                        <div id = "notmodel" class="alert alert-danger alert-dismissible" role="alert" hidden>
                     <strong>Error!</strong> Serial <b id="Serial_Error5" name="Serial_Error5"></b> Not Belong to Model!</div>

                      <div id = "notexist" class="alert alert-danger alert-dismissible" role="alert" hidden>
                     <strong>Error!</strong> Serial <b id="Serial_Error5" name="Serial_Error5"></b> Not Exist!</div>

                       <form method="POST">
                        <div class="form-group">
                          <label for="usr">Model:</label>
                          <Select class="form-control" id="cmbModel" name="cmbModel" autofocus>
                           <option></option>
                           <?php 
                           $SelectGroup = Model::SelectAllMotherModel($_SESSION['account']);
                           for($i=0;$i<count($SelectGroup);$i++){
                            ?>
                            <option value ='<?php echo $SelectGroup[$i]->getModel(); ?>' <?php if($cmbmodel==$SelectGroup[$i]->getModel()) {echo "selected";} ?> ><?php echo $SelectGroup[$i]->getModel(); ?></option>
                            <?php 
                          }
                          ?> 
                        </Select>
                      </div>
                      <div class="form-group">
                        <label for="usr">Station:</label>
                        <Select class="form-control" id="cmbStation" name="cmbStation" disabled>

                        </Select>
                      </div>
                      <div class="form-group">
                        <div class="row">
                         <div class="col-md-9">
                          <label for="usr">Line:</label>
                          <Select class="form-control" id="cmbLine" name="cmbLine" disabled>
                           <option></option>
                           <?php 
                           $SelectLine = Line::SelectAllLine($_SESSION['account'],$_SESSION['module']);
                           for($i=0;$i<count($SelectLine);$i++){
                            ?>
                            <option value ='<?php echo $SelectLine[$i]->getLine(); ?>' <?php if($cmbline== $SelectLine[$i]->getLine()) {echo "selected";} ?> >Line: <?php echo $SelectLine[$i]->getLine(); ?></option>
                            <?php 
                          }
                          ?>
                        </Select>
                      </div>
                      <div class="col-md-3" hidden>
                        <label for="pwd">Sequence:</label>
                        <input type="number" min="0" max="200" class="form-control" id="txtSeq" name="txtSeq" value="<?php echo $seq;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                     <div class="col-md-9">
                      <label for="pwd">Mother Serial:</label>
                      <input type="text" class="form-control" id="StextSerial" name="StextSerial" onkeypress="if (event.keyCode == 13)  return false;" required readonly>
                    </div>
                     <div class="col-md-3">
                        <label for="pwd">Qty:</label>
                        <input type="number" class="form-control" id="txtQty" name="txtQty" value="<?php echo $qty1;?>" readonly>
                      </div>
                  </div>
                </div>
              <div id="serial" hidden>
                <div class="form-group">
                    <div class="row">
                     <div class="col-md-9">
                      <label for="pwd">Serial Number:</label>
                      <input type="text" class="form-control" id="StextSerial4" name="StextSerial4" onkeypress="if (event.keyCode == 13)  return false;" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="pwd">Qty:</label>
                        <input type="number"  class="form-control" id="txtQty4" name="txtQty4" value="<?php echo $qty3;?>" readonly>
                      </div>
                  </div>
                </div>  
              </div>

                  <div id="batch" hidden>
                  <div class="form-group">
                    <div class="row">
                     <div class="col-md-9">
                      <label for="pwd">Top Serial Number:</label>
                      <input type="text" class="form-control" id="StextSerialS1" name="StextSerialS1" onkeypress="if (event.keyCode == 13)  return false;" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="pwd">Qty:</label>
                        <input type="number"  class="form-control" id="txtQtyPT1" name="txtQtyPT1" value="<?php echo $qtyPT1;?>" readonly>
                      </div>
                  </div>
                </div>  

                   <div class="form-group" >
                    <div class="row">
                     <div class="col-md-9">
                      <label for="pwd">Bottom Serial Number:</label>
                      <input type="text" class="form-control" id="StextSerialS2" name="StextSerialS2" onkeypress="if (event.keyCode == 13)  return false;" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="pwd">Qty:</label>
                        <input type="number"  class="form-control" id="txtQtyPT2" name="txtQtyPT2" value="<?php echo $qtyPT2;?>" readonly>
                      </div>
                  </div>
                </div> 
                </div>       
               
                  <div class="row" >
                    <div class="col-md-12">
                   
                      <button style="float:right;" type ="button" class="btn btn-primary emp-btn" id ="btnClear" name="btnClear" >CLEAR</button>                   
                    </div>
                  </div>
                </div>

                <div class="mdl-cell--top mdl-cell--12-col mdl-cell--6-col-desktop">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Serial  Number Details</div>
                    <div class="panel-body">
                          <div class="row">
                            <div class="col-md-3">
                                <label>Model:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" id="txtModel" name="txtModel" value="<?php echo $model;?>" class="form-control input-sm" <?php echo $readonly; ?>><br>
                            </div>
                            <div class="col-md-3">
                                <label>Type:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" id="txtRev" name="txtRev" value="<?php echo $revision;?>" class="form-control input-sm" <?php echo $readonly; ?>><br>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-3">
                                <label>Line:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" id="txtLine" name="txtLine" value="<?php echo $line;?>" class="form-control input-sm" <?php echo $readonly; ?>><br>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                                <label>Location:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" id="txtLocation" name="txtLocation" value="<?php echo $location;?>" class="form-control input-sm" <?php echo $readonly; ?>><br>
                            </div>
                          </div>
                              <div class="row">
                            <div class="col-md-3">
                                <label>Status:</label>
                            </div>
                            <div class="col-md-5">
                            <input type="text" id="txtStatus" name="txtStatus" value="<?php echo $status;?>" class="form-control input-sm" <?php echo $readonly; ?>><br>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-3">
                                <label>Created By:</label>
                            </div>
                            <div class="col-md-5">
                            <input type="text" id="txtCreatedBy" name="txtCreatedBy" value="<?php echo $createdby;?>" class="form-control input-sm" <?php echo $readonly;  ?>><br>
                            </div>
                          </div>
                  </div>      
              </div>
      </form>

<script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#cmbModel').change(function (){
          if (document.getElementById("cmbModel").value == '') { 
            return;
          }else {
            $('#cmbModel').css('pointer-events','none');
            $("#cmbModel").attr("readonly",true);

            $('#cmbStation').css('pointer-events','auto');
            $("#cmbStation").attr("readonly",false);
            $("#cmbStation").attr("disabled",false);
            $('#cmbStation').focus();

              // document.getElementById("cmbStation").innerHTML = "";  
              
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 var result = this.responseText;
                 var res = result.split("_");
                 var x1 = document.getElementById("cmbStation");
                 var option1 = document.createElement("option");
                 option1.text = '';
                 x1.add(option1);
                 for (i = 0; i < res.length - 1; i++) { 
                      // alert(res[i]);
                      var x = document.getElementById("cmbStation");
                      var option = document.createElement("option");
                      option.text = res[i];
                      x.add(option);
                    }
                  }
                };

                xmlhttp.open("GET", "../php/linking_getstationlink.php?modelno=" + document.getElementById("cmbModel").value+"&formodel=0&station=test", true);
                xmlhttp.send();

              }

          if (document.getElementById('cmbModel').value =='Wall Charger - MA' || document.getElementById('cmbModel').value=='Wall Charger - Serial'){

            document.getElementById("batch").removeAttribute("hidden");
            document.getElementById("serial").setAttribute("hidden","");

        }else{

            document.getElementById("batch").setAttribute("hidden","");
            document.getElementById("serial").removeAttribute("hidden");
         
        }

    });

    $('#cmbStation').change(function (){
         

          if (document.getElementById("cmbModel").value == '') {
              $('#cmbModel').focus();
          }else{

                  $('#cmbStation').css('pointer-events','none');
                  $("#cmbStation").attr("readonly",true);

                  $('#cmbLine').css('pointer-events','auto');
                  $("#cmbLine").attr("readonly",false);
                  $("#cmbLine").attr("disabled",false);
                  $('#cmbLine').focus();


           var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               var result1 = this.responseText;
               var res4 = result1.split("_");
               var res5 = result1.split("&");
/* alert(result1);*/
                    for (a = 0; a < res5.length - 1; a++) { 
                       var res6 = res5[a].split("_");
                      $('#tbldetails').append("<tr id ='tr"+res6[0]+"'><td>"+res6[0]+"</td><td>"+res6[1]+"</td><td>"+res6[2]+"</td><td>"+res6[3]+"</td></tr>")
                    }
              }
        };
          xmlhttp.open("GET", "../php/getlinkmaintenance.php?modelno=" + document.getElementById("cmbModel").value + "&station=" + document.getElementById("cmbStation").value, true);
            xmlhttp.send();


        }

      
      });
    $('#cmbLine').change(function (){
          if (document.getElementById("cmbLine").value == '') {

            document.getElementById("StextSerial").disabled = true;
            document.getElementById("StextSerial").value = '';
            document.getElementById("txtModel").value = '';
            document.getElementById("txtRev").value = '';
            document.getElementById("txtLocation").value = '';
            document.getElementById("txtStatus").value = '';
            document.getElementById("txtCreatedBy").value = '';
            document.getElementById("btnGood").disabled = true;
            document.getElementById("btnReject").disabled = true;
            //$("#StextSerial").attr("readonly",false);
            document.getElementById("StextSerial").removeAttribute("readonly");

          }else if(document.getElementById('cmbModel').value =='Wall Charger - MA' || document.getElementById('cmbModel').value=='Wall Charger - Serial'){
               $('#cmbLine').css('pointer-events','none');
            $("#cmbLine").attr("readonly",true);

            $('#StextSerialS1').css('pointer-events','auto');
            $("#StextSerialS1").attr("readonly",false);
            $("#StextSerialS1").attr("disabled",false);
            $('#StextSerialS1').focus();

          }else{

            $('#cmbLine').css('pointer-events','none');
            $("#cmbLine").attr("readonly",true);

            $('#StextSerial').css('pointer-events','auto');
            $("#StextSerial").attr("readonly",false);
            $("#StextSerial").attr("disabled",false);
            $('#StextSerial').focus();
          }
        });  

    $('#StextSerialS1').keyup(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  var exist = false;

  if(keycode == '13'){


    document.getElementById("success").setAttribute("hidden","");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");

    if (document.getElementById("StextSerialS1").value == '') {     
      return;
    }else {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var result = this.responseText;
         var res = result.split("_");
        alert(result);
      if (res[0]  == 'success'){

    document.getElementById("success").setAttribute("hidden","");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
     document.getElementById("notmodel").setAttribute("hidden","");

     document.getElementById('StextSerialS1').readOnly = true;
     document.getElementById('StextSerialS2').focus();
     document.getElementById('StextSerialS2').readOnly = false;

     document.getElementById("txtQtyPT1").value = res[2];
     


      }else if(res[0] =='notmodel'){

    document.getElementById("notmodel").removeAttribute("hidden");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("success").setAttribute("hidden","");


     document.getElementById('txtQtyPT1').value = 0;
     document.getElementById('StextSerialS1').select();
     document.getElementById('StextSerialS1').focus();

      }

              }
            };
            xmlhttp.open("GET", "../php/F5_linktopserial.php?batch=" + document.getElementById("StextSerialS1").value+"&model="+ document.getElementById("cmbModel").value, true);
            xmlhttp.send();
          }

        }

  });

    $('#StextSerialS2').keyup(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  var exist = false;

  if(keycode == '13'){


    document.getElementById("success").setAttribute("hidden","");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");

    if (document.getElementById("StextSerialS2").value == '') {     
      return;
    }else {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var result = this.responseText;
         var res = result.split("_");
       // alert(result);
      if (res[0]  == 'success'){

    document.getElementById("success").setAttribute("hidden","");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
     document.getElementById("notmodel").setAttribute("hidden","");

     document.getElementById('StextSerialS1').readOnly = true;
     document.getElementById('StextSerialS2').focus();
     document.getElementById('StextSerialS2').readOnly = true;
     document.getElementById('StextSerial').focus();
     document.getElementById('StextSerial').readOnly = false;

     document.getElementById("txtQtyPT2").value = res[2];

      }else if(res[0] =='notmodel'){

    document.getElementById("notmodel").removeAttribute("hidden");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("success").setAttribute("hidden","");


     document.getElementById('txtQtyPT2').value = 0;
     document.getElementById('StextSerialS2').select();
     document.getElementById('StextSerialS2').focus();

      }

              }
            };
            xmlhttp.open("GET", "../php/F5_linkbotserial.php?batch=" + document.getElementById("StextSerialS2").value+"&model="+ document.getElementById("cmbModel").value, true);
            xmlhttp.send();
          }

        }

      });

    $('#StextSerial').keyup(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  var exist = false;

  if(keycode == '13'){


    document.getElementById("success").setAttribute("hidden","");
    document.getElementById("offroute").setAttribute("hidden","");
    document.getElementById("error1").setAttribute("hidden","");
    document.getElementById("forlotmaking").setAttribute("hidden","");
    document.getElementById("forcardlink").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");
    document.getElementById("successreject").setAttribute("hidden","");
    document.getElementById("serialreject").setAttribute("hidden","");

    if (document.getElementById("StextSerial").value == '') {     
      return;
    }else {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var result = this.responseText;
         var res = result.split("_");
        //alert(result);
         if( res[0]  == 'success'){

          document.getElementById("txtSeq").value = res[2];

          document.getElementById("StextSerial").setAttribute("readonly","");
          
            document.getElementById("StextSerial4").removeAttribute("readonly");
            document.getElementById('StextSerial4').focus();
            document.getElementById('StextSerial4').select();

          document.getElementById("success").setAttribute("hidden","");
          document.getElementById("offroute").setAttribute("hidden","");
          document.getElementById("error1").setAttribute("hidden","");
          document.getElementById("forlotmaking").setAttribute("hidden","");
          document.getElementById("forcardlink").setAttribute("hidden","");
          document.getElementById("serialreject").setAttribute("hidden","");
          document.getElementById("successreject").setAttribute("hidden","");
          document.getElementById("serialreject").setAttribute("hidden","");
          document.getElementById("wrongmodel").setAttribute("hidden","");

          document.getElementById("SerialNumber").innerHTML = res[1];
          document.getElementById("txtQty").value = res[2];
       
                  }else if(res[0]  == 'insert0'){

                    document.getElementById("StextSerial").removeAttribute("readonly");
                    document.getElementById("txtQtyPT1").value = res[3];
                    document.getElementById("txtQtyPT2").value = res[3];
                    document.getElementById("txtQty").value = res[2];

                    document.getElementById("StextSerial").focus();
                    document.getElementById("StextSerial").select();
    /*                      var myVar = setInterval(myTimer, 1500);


                function myTimer(){
                  document.getElementById("StextSerial").value ='';
                  document.getElementById("txtQty").value ='';
                document.getElementById("txtModel").value ='';
                document.getElementById("txtRev").value ='';
                document.getElementById("txtLine").value ='';
                document.getElementById("txtLocation").value ='';
                document.getElementById("txtStatus").value ='';
                document.getElementById("txtCreatedBy").value ='';


                }*/
                    

                }else if(res[0]  == 'success1'){

                    document.getElementById("StextSerialS1").value = "";
                    document.getElementById("StextSerialS2").value = "";
                    document.getElementById("StextSerial").value = "";
                    document.getElementById("txtQtyPT2").value = 0;
                    document.getElementById("txtQtyPT1").value = 0;
                    document.getElementById("txtQty").value = 0;

                    document.getElementById("StextSerialPT1").focus();


                    document.getElementById("StextSerial").setAttribute("readonly","");
                    document.getElementById("StextSerialS1").removeAttribute("readonly");

                  document.getElementById("offroute").setAttribute("hidden","");
                  document.getElementById("offroute").setAttribute("hidden","");
                  document.getElementById("success").removeAttribute("hidden")

              }else {
                  //alert(result);
                  document.getElementById("success").setAttribute("hidden","");
                  document.getElementById("offroute").setAttribute("hidden","");
                  document.getElementById("offroute").removeAttribute("hidden")
                  document.getElementById("Serial_Error2").innerHTML = res[0];

                  document.getElementById('StextSerial').focus();
                  document.getElementById('StextSerial').select();
                }

              }
            };
            xmlhttp.open("GET", "../php/F5_motherseriallink.php?serialno=" + document.getElementById("StextSerial").value +"&model="+ document.getElementById("cmbModel").value +"&station="+ document.getElementById("cmbStation").value +"&line="+ document.getElementById("cmbLine").value+"&qtypt1="+ document.getElementById("txtQtyPT1").value+"&qtypt2="+ document.getElementById("txtQtyPT2").value+"&S1="+ document.getElementById("StextSerialS1").value+"&S2="+ document.getElementById("StextSerialS2").value+ "&line="+ document.getElementById("cmbLine").value, true);
            xmlhttp.send();
          }

        }

      });

  });
        


</script>     
</div>
</div>
</main>
