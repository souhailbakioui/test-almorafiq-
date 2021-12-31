<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta content="Devq" name="author"/>

    <title>Détails de la Facture</title>

    <!-- App css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="./scripts/scripts.js"></script>
<script>
            $(document).ready(function() {
                    refresh();
                    $('.datatable-1').dataTable();
                    $('.datatable-1').find('thead th').css('width', 'auto');
                    $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                    $('.dataTables_paginate > a').wrapInner('<span />');
                    $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                    $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');

            } );
	</script>
    <!-- custom css -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"/> -->
</head>

<body>
    <div>
        <div class="row">
            <!-- <div class="col-sm-1"></div> -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 page-print">
                                <div class="card-box">
                                    <!-- Logo & title -->
                                <div class="clearfix" id="header_logo">
                                    <div class="clearfix">
                                  
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-3" style="margin-top: -30px;">
                                                   
                                                    <div class="row  img-div">
                                                        <img src="facture/images/LOGO.png" alt="" 	style="width: auto;height: 120px;">
                                                        <p class="ml-3 h2 col-2 font-24" th:text="${orderLines[0].order.user.company.description"></p>
                                                    </div>
                
                                                </div>
                                                <div class="col-sm-8  d-print-none">
                                                  <span class="float-right">
                                                    Avec En-tête
                                                    <input type="checkbox" id="entete-check">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            
                
                                        </div><!-- end col -->
                                        <div class="col-md-4 offset-md-2">
                                         
                                        </div><!-- end col -->
                                    </div>
                                </div>
                                    <!-- end row -->
                
                                    <div class="row mt-1" id="info">
                                        <div class="h-divider" style=" margin:20px auto; height:1px; width:90%; border-top:1px solid gray; opacity: 0.8;"></div>
                                        <div class="col-sm-6">
                                            <div class="mt-3 ">
                                                <p class="m-b-10">
                                                    <strong>Date de la Facture : </strong>
                       
                                                    <span class=""> &nbsp;&nbsp;&nbsp;&nbsp; <span></span></span>
                                                </p>
                                                <p class="m-b-10"><strong>Statut : </strong> <span class="">
                                                   
                
                                                </span></p>
                                                <p class="m-b-10">
                                                    <span th:if="${orderLines[0].order.statut=='Valider'">
                                                        <strong >Facture N° : </strong>
                                                    </span>
                                                 
                                                   
                                                    <p class="m-b-10">
                                                        <span >
                                                            <strong >RI : </strong>
                                                        
                                                        </span>
                                                    
                                                    </p>
                                            </div>
                                        </div> <!-- end col -->
                
                                        <div class="col-sm-6 font-18">
                                            <h4  class="font-20" th:text="${orderLines[0].order.customer.socialReason"></h4>
                                            <address>
                                                <span>ICE</span><br>   
                                                <span> Address</span><br>                                                          
                                                <span>Ville</span><br>
                                                <span>Pays</span><br>
                                            </address>
                                        </div> <!-- end col -->
                                    </div> 
                                    <!-- end row -->
                
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="datatable-1 table table-bordered table-striped	 display" id="tables">
                                                    <thead>
                                                    <tr style="border-bottom: 2px solid black;"><th>#</th>                                       
                                                        <th style="min-width: 170px;">Désignation</th>
                                                        <th class="price">Prix unitaire</th>                                        
                                                        <th class="price">Qté</th>
                                                        <th class="price">Remise</th>
                                                        <th class="price">TVA</th>
                                                        <th class="price">Total HT</th>	
                                                    </tr></thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Nom</td>
                                                            <td class="price">Pxix unitaire</td>
                                                            <td class="price">Qté</td>
                                                            <td class="price">Remise</td>
                                                            <td class="price">%</td>
                                                            <td class="price"></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive -->
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="clearfix pt-5">
                                                <!-- <h5 class="">TVA:</h5> -->
                                                <div class="h-divider" style=" margin-top:5px;margin-bottom:45px; height:1px; width:30%; border-top:1px solid gray; opacity: 0.8;"></div>
                                                <p>Arrêtée la présente facture à la somme de:</p>
                                                <p class="number-word"></p>
                                                <div th:if="${orderLines[0].order.statut != 'Devis'">
                                                    <p th:if="${orderLines[0].order.payements[0].payementType=='cash'">Mode de Paiement : <span class="text-uppercase">Espèce</span></p>
                                                   
                                                </div>
                                                
                                            </div>
                                            <div class="h-divider" style=" margin-top:5px;margin-bottom:45px; height:1px; width:40%; border-top:1px solid gray; opacity: 0.8;"></div>
                                            
                                        </div> <!-- end col -->
                                        <div class="col-sm-6 mt-4">
                                            <div class="float-right">
                                                <p><b></b><h4 > Sous-total (HT):<span class="float-right ht-price"></span>XXXXDH </h4></p>
                                                <p>
                                                    <span >TVA 0% : <span class="float-right"></span>XXXXX DH<br></span>
                                                </p>
                                                <p>
                                                    <span>TVA 7% : <span class="float-right"></span>XXXXX DH<br></span>
                                                </p>
                                                <p>
                                                    <span>TVA 14% : <span></span>XXXXX DH<br></span>
                                                </p>
                                                <p>
                                                    <span>TVA 20% : <span></span>XXXXX DH</span>
                                                </p>
                                                <p><b>Total TVA:</b> <span class="float-right"> &nbsp;&nbsp;&nbsp;<span>XXXXX DH</span>
                                                </span></p>
                                                <p><b></b><h4> Total <span class="float-right font-16" ><span class="total-price">50.000,12</span></span> </h4></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                
                                    <div class="mt-4 mb-1">
                                        <div class="text-right d-print-none">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Imprimer</a>
                                            <a onclick="printer()" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                        </div>
                                    </div>
                             
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <div class="footers" style="margin-top: 2px;" >
                            <div class="h-divider" style=" margin-top:5px;margin-bottom:45px; height:1px; width:100%; border-top:1px solid gray; opacity: 0.3;"></div>
                            <div class="text-center">
                                <p>
                                    <span>Raison sociale : ALMORAFIQ - Adresse : 50, Boulevard Moulay Youssef, IMM ALFATH B N°39, Tanger</span><span ></span><br>
                                    <span>ICE : 002113682000051 - Identifiant Fiscal : 00000000 </span><span></span><br>
                                    <span >Telephone : 0539340974<span></span></span>
                                    <span></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <!-- <script src="libs/numbersWords/written-number.min.js" type="text/javascript"></script>
        <script src="libs/numbersWords/written-number.js" type="text/javascript"></script>
        <script src="js/customs/orderDetail.js" type="text/javascript"></script> -->
        
    </div>

</body>
</html>