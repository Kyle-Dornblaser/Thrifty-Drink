<?php include 'header.php'; ?>
			<div id="left">
				<h2>Find drink prices</h2>
				<form action="search.php" method="get">
					<table>
						<tr>
							<td>Restaurant Name</td>
							<td>
								<input type="text" name="search" placeholder="Restaurant Name" />
							</td>
							<td><input type="submit" value="Search"/></td>
						</tr>
					</table>
				</form>
				<h2><a href="restaurants.php">Or View All Restaurants</a></h2>
			</div>
			
			<div id="right">
				<h2>Submit Drink Price</h2>
				<form id="submit_drink" action="submit.php" method="post">
					<table id="submit_drink_table">
						<tr>
							<td>Restaurant Name</td>
							<td>
								<input type="text" name="restaurant" placeholder="Restaurant Name" required />
							</td>
						</tr>
						<tr>
							<td>Zip Code</td>
							<td>
								<input type="text" name="zip" placeholder="Zip Code" required />
							</td>
						</tr>
						<tr>
							<td>Drink Name</td>
							<td>
								<input type="text" name="drink" placeholder="Drink Name" required />
							</td>
						</tr>
						<tr>
							<td>Price</td>
							<td>
								<input type="text" name="price" placeholder="Price" required />
							</td>
						</tr>
						<tr>
							<td>Drink Type</td>
							<td>
								<input type="radio" name="drink_type" value="beer" checked="checked">Beer
								<input type="radio" name="drink_type" value="wine">Wine
								<input type="radio" name="drink_type" value="cocktail">Cocktail
								<input type="radio" name="drink_type" value="other">Other
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Submit"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="clear"></div>
<?php include 'footer.php'; ?>
