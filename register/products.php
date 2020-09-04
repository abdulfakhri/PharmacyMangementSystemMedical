<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
include('../c/v/nav.php');
include('../m/product_reg/productAPI.php');
?>
   

<body>
       



       
        <center> <h1>Manual Product Entry </h1> 
   
            <div class="container">
            <form action="productAPI.php" method="POST">

                <div class="row">
                    
                    
                          <div class="col-25">
                           <label for="">Product:</label> 
                           <input id="" name="product_name" placeholder="Product Name" type="text" required />
                           <label for="">Quantity:</label> 
                           <input id="" name="quantity" placeholder="Quantity" type="text"required />
                           <label for="">Company:</label> 
                           <input id="" name="company_name" placeholder="Company" type="text"required />
                           <label for="">Packing:</label>
                           <input id="" name="packing" placeholder="Packing" type="text" required  />
                            
                           <label for="">Bill Date:</label>
                           <input id="" name="bill_date" placeholder="Date of Purchase" type="text" required/>
                           
                            <label for="">Bill Name/No :</label>
                           <input id="" name="bill_name" placeholder="Name of The Bill" type="text" required/>
                        
                  
                         
                        </div>
                    
                         <div class="col-25">

                            <label for="">MRP:</label>
                           <input id="" name="price" placeholder="0.000 Rs" type="text" required  /> 
                           <label for="">Batch No:</label>
                           <input id="" name="batch_no" placeholder="Batch No..." type="text"  required />
                           
                           <label for="">Expiry Date:</label>
                           <input id="" name="expiry_date" placeholder="YYYY-MM-DD" type="text" required  />
                        
                            <label for="">Expiry Alert Date:</label>
                           <input id="" name="expiry" placeholder="YYYY-MM-DD" type="text" required  />
                           
                           <label for="">QR/Bar Code:</label>
                           <input id="" name="barcode" placeholder="Code On Product" type="text" />
                         
                           <label for="">Dealer :</label>
                           <input id="" name="supplier" placeholder="Name of The Dealer" type="text" required />
                          
                              
                                
                        </div> 

                </div>
                    
                 
                
                
                <div class="row">
                    
                        <div class="col-50">

                         <button type="submit"  class="btn btn-default" name='addproduct' >Add Product</button>
                         
                         <button type="reset" class="btn btn-default">Clear Form </button>

                        </div>
                        
                      
                </div>
 
            </form>
            
        </div>
        </center>
        
<?php 
include('../c/v/footer.php');
?>