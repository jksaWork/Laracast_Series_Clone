<footer>
	<div class="custom_container">
		<div class="align_itemm row ">
			<div class="col-md-6">
				<ul class="footer_links">
					<li>
						<a href="#">
							كل الحقوق محفوظه نقره
							&copy; 2020 - <?php echo date('Y') ?>
						</a>
					</li>
			</div>
			<div class="col-md-6">
				<ul class="footer_links">
					<li>
						<a href="privcy.php">
							سياسه الخصوصيه
						</a>
					</li>
					<li>
						<a href="privcy.php">
							من نحن
						</a>
					</li>
					<li>
						<a href="contact.php">
							اتصل بنا
						</a>
					</li>
					@if(!auth()->check())
						<li>
							<a href="#top" data-toggle="modal" data-target="#exampleModal">
								Login
							</a>
						</li>
					@else
						<li>
							<a href="{{route('get.logout')}}" data-toggle="Modal" data-target="Logout">
								Logout
							</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	<div>
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button> --}}
                      <!-- Modal -->
                    <Login></Login>
                    </div>
</footer>
</body>

</html>
