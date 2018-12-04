<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Products Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product/add'); ?>" class="btn btn-success btn-sm">Add Product</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="product_wrapper">
                    <thead>
                    <tr>
                        <th>Sr</th>
						<th class="dn">ID</th>
                        
                        <th>Thumbnail</th>
                        <th>Name</th>						
						<th>Sku</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Brand</th>
						<th>Tax Class</th>
						<!--<th>Wholesale Price <center>Prices</center>
                        	<table width="100%" border="1">
                            	<tr><th width="33%" title="wholesaler price">WS</th><th width="33%" title="Retailer Price">RT</th>
                                <th width="33%" title="Consumer Price">CN</th></tr>
                            </table> 
                        </th>-->
						<th>Actions</th>
                    </tr>
                    <thead>
                    <tbody>    
                    <?php
                    $i=1;
                     foreach($products as $p){                         
                        $tax_class = $this->Tax_clas_model->get_tax_clas($p['tax_class']);
                        $category = $this->Category_model->get_category($p['category_id']);
                        $brand = $this->Brand_model->get_brand($p['brand_id']);
                    ?>
                    <tr>
                        <td><?=$i++?>
						<td class="dn"><?php echo $p['id']; ?></td>
                        
                        <td>
                            <?php if(!empty($p['thumbnail'])){ ?>
                                <image src="<?php echo base_url(); ?>upload/product/<?php echo $p['thumbnail']; ?>" width="50" alt="<?php echo $p['thumbnail']; ?>" />
                            <?php } ?>
                        </td>
                        <td><?php echo $p['name']; ?></td>						
						<td><?php echo $p['sku']; ?></td>
                        <td><?php echo $p['quantity'] ?></td>
                        <td><?php echo $category['cat_name']; ?></td>
                        <td><?php echo $brand['name']; ?></td>
						<td><?php echo $tax_class['tax_per']; ?>%</td>
						<!--<td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $p['wholesaler_price']; ?></td>

                            <table width="100%">
                            	<tr><td width="33%"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $p['wholesaler_price']; ?></td>
                                <td width="33%"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $p['retailer_price']; ?></td>
                                <td width="33%"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $p['consumer_price']; ?></td>
                                </tr>
                            </table> 
                        </td>		-->				
						<td>
                            <a href="<?php echo site_url('product/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('product/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                <div class="pull-right">
                    <?php // echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
