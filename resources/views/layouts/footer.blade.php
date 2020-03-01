
<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h3> E-Shop </h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Pages </h3>
                    <ul>
                        <li><a href="/">Home <span class="sr-only">(current)</span></a></li>
				        <li><a href="/about">About</a></li>
				        <li><a href="/front/categories">Categories</a></li>
				        <li><a href="/contact">Contact Us</a></li>
				        @if(! Auth::check())
				        <li><a href="/login">Login</a></li>
        				<li><a href="/login">Register</a></li>
        				@endif
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Contact Us </h3>
                    <ul>
                        <li> <i class=" fa fa-phone"></i> : 123456 </li>
                        <li> <i class=" fa fa-phone"></i> : 123456 </li>
                        <li> <i class=" fa fa-phone"></i> : 123456 </li>
                        <li> <i class=" fa fa-phone"></i> : 123456 </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3>Newsletter</h3>
                    <ul>
                        <li>
                             <p>
			                    <div class="input-group">
			                      <input type="text" class="form-control" placeholder="Search for...">
			                      <span class="input-group-btn">
			                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
			                      </span>
			                    </div>
			                 </p>
                        </li>
                    </ul>
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © Website 2017. All right reserved. </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>


