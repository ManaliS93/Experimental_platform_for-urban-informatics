<html>
<div id = "loader">
	<div align="center"><img src="images/loading.gif"></div>
</div>
<?php
	//If not already started start
	
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	/*
	function shutdown() 
	 { 
	    $a=error_get_last(); 
	    print_r($a);
	    if($a==null)   
	        echo "No errors"; 
	    else{
       		header("Location: map.php");		
          	echo "<script>
				alert('Maximum time reached..Timeout occured');
				</script>";
		}

	 } 
	register_shutdown_function('shutdown'); 
	 */
	ini_set('max_execution_time', 1200);
	
	
	$level1 = array("Arts&Entertainment", "College&University", "Event", "Food", "NightlifeSpot", "Outdoors&Recreation", 
				"Professional&OtherPlaces", "Residence", "Shop&Service", "Travel&Transport");
	$level2 = array(array("Amphitheater","Aquarium", "Arcade", "Art Gallery", "Bowling Alley", "Casino", "Circus", "Comedy Club", "Concert Hall", "Country Dance Club",
						"Disc Golf", "Exhibit", "General Entertainment", "Go Kart Track", "Historic Site", "Laser Tag", "Memorial Site", "Mini Golf", "Movie Theater",
						"Museum", "Music Venue", "Performing Arts Venue", "Pool Hall", "Public Art", "Racecourse", "Racetrack", "Roller Rink", "Salsa Club",
						"Samba School", "Stadium", "Theme Park", "Tour Provider", "Water Park", "Zoo"),
						
					array("College Academic Building", "College Administrative Building", "College Auditorium", "College Bookstore", "College Cafeteria",
						"College Classroom", "College Gym", "College Lab", "College Library", "College Quad", "College Rec Center", "College Residence Hall",
						"College Stadium", "College Theater", "Community College", "Fraternity House", "General College & University", "Law School", "Medical School",
						"Sorority House", "Student Center", "Trade School", "University"), 
						
					array("Christmas Market", "Conference", "Convention", "Festival", "Music Festival", "Other Event", "Parade", "Stoop Sale", "Street Fair"),

					array("Afghan Restaurant", "African Restaurant", "American Restaurant", "Asian Restaurant", "Australian Restaurant", "Austrian Restaurant",
						"BBQ Joint", "Bagel Shop", "Bakery", "Belgian Restaurant", "Bistro", "Brazilian Restaurant", "Breakfast Spot", "Bubble Tea Shop",
						"Buffet", "Burger Joint", "Cafeteria", "Café", "Cajun / Creole Restaurant", "Caribbean Restaurant", "Caucasian Restaurant", 
						"Coffee Shop", "Comfort Food Restaurant", "Creperie", "Czech Restaurant", "Deli / Bodega", "Dessert Shop", "Diner", "Donut Shop",
						"Dumpling Restaurant", "Eastern European Restaurant", "English Restaurant", "Falafel Restaurant", "Fast Food Restaurant", 
						"Fish & Chips Shop", "Fondue Restaurant", "Food Court", "Food Stand", "Food Truck", "French Restaurant", "Fried Chicken Joint", 
						"Friterie", "Gastropub", "German Restaurant", "Gluten-free Restaurant", "Greek Restaurant", "Halal Restaurant", "Hawaiian Restaurant",
						"Hot Dog Joint", "Hungarian Restaurant", "Indian Restaurant", "Irish Pub", "Italian Restaurant", "Jewish Restaurant", "Juice Bar",
						"Latin American Restaurant", "Mac & Cheese Joint", "Mediterranean Restaurant", "Mexican Restaurant", "Middle Eastern Restaurant",
						"Modern European Restaurant", "Molecular Gastronomy Restaurant", "Pakistani Restaurant", "Pet Café", "Pizza Place", "Polish Restaurant",
						"Portuguese Restaurant", "Poutine Place", "Restaurant", "Russian Restaurant", "Salad Place", "Sandwich Place", "Scandinavian Restaurant",
						"Seafood Restaurant", "Slovak Restaurant", "Snack Place", "Soup Place", "South American Restaurant", "Southern / Soul Food Restaurant", 
						"Spanish Restaurant", "Sri Lankan Restaurant", "Steakhouse", "Swiss Restaurant", "Tea Room", "Theme Restaurant", "Turkish Restaurant",
						"Ukrainian Restaurant", "Vegetarian / Vegan Restaurant", "Wings Joint"),

					array("Bar", "Brewery", "Lounge", "Night Market", "Nightclub", "Other Nightlife", "Speakeasy", "Strip Club"),

					array("Athletics & Sports", "Bath House", "Bathing Area", "Bay", "Beach", "Bike Trail", "Botanical Garden", "Bridge", "Campground", 
						"Canal Lock", "Canal", "Castle", "Cave", "Cemetery", "Dive Spot", "Dog Run", "Farm", "Field", "Fishing Spot", "Forest", "Fountain",
						"Garden", "Gun Range", "Harbor / Marina", "Hot Spring", "Island", "Lake", "Lighthouse", "Mountain", "National Park", "Nature Preserve",
						"Other Great Outdoors", "Palace", "Park", "Pedestrian Plaza", "Playground", "Plaza", "Pool", "Rafting", "Recreation Center",
						"Reservoir", "River", "Rock Climbing Spot", "Scenic Lookout", "Sculpture Garden", "Ski Area", "Stables", "States & Municipalities",
						"Summer Camp", "Trail", "Tree", "Vineyard", "Volcano", "Waterfall", "Waterfront", "Well"), 

					array("Animal Shelter", "Auditorium", "Ballroom", "Building", "Business Center", "Club House", "Community Center", "Convention Center",
						"Cultural Center", "Distillery", "Distribution Center", "Event Space", "Factory", "Fair", "Funeral Home", "Government Building",
						"Industrial Estate", "Library", "Medical Center", "Military Base", "Non-Profit", "Office", "Parking", "Post Office", "Prison",
						"Radio Station", "Recruiting Agency", "School", "Social Club", "Spiritual Center", "TV Station", "Voting Booth", "Warehouse",
						"Wedding Hall", "Winery"),

					array("Assisted Living", "Home (private)", "Housing Development", "Residential Building (Apartment / Condo)", "Trailer Park"),

					array("ATM", "Adult Boutique", "Antique Shop", "Arts & Crafts Store", "Astrologer", "Auto Garage", "Auto Workshop", "Automotive Shop", 
						"Baby Store", "Bank", "Batik Shop", "Betting Shop", "Big Box Store", "Bike Shop", "Board Shop", "Bookstore", "Bridal Shop", 
						"Business Service", "Camera Store", "Candy Store", "Car Dealership", "Car Wash", "Carpet Store", "Check Cashing Service", "Chocolate Shop",
						"Clothing Store", "Comic Shop", "Construction & Landscaping", "Convenience Store", "Cosmetics Shop", "Costume Shop", "Credit Union",
						"Daycare", "Department Store", "Design Studio", "Discount Store", "Dive Shop", "Drugstore / Pharmacy", "Dry Cleaner", "EV Charging Station",
						"Electronics Store", "Entertainment Service", "Event Service", "Fabric Shop", "Film Studio", "Financial or Legal Service", "Fireworks Store",
						"Fishing Store", "Flea Market", "Floating Market", "Flower Shop", "Food & Drink Shop", "Frame Store", "Fruit & Vegetable Store", 
						"Furniture / Home Store", "Gaming Cafe", "Garden Center", "Gas Station", "Gift Shop", "Gun Shop", "Hardware Store", "Health & Beauty Service",
						"Herbs & Spices Store", "Hobby Shop", "Home Service", "Hunting Supply", "IT Services", "Internet Cafe", "Jewelry Store", "Knitting Store",
						"Laundromat", "Laundry Service", "Lawyer", "Leather Goods Store", "Locksmith", "Lottery Retailer", "Luggage Store", "Marijuana Dispensary",
						"Market", "Massage Studio", "Mattress Store", "Miscellaneous Shop", "Mobile Phone Shop", "Mobility Store", "Motorcycle Shop", "Music Store",
						"Nail Salon", "Newsstand", "Optical Shop", "Other Repair Shop", "Outdoor Supply Store", "Outlet Store", "Paper / Office Supplies Store",
						"Pawn Shop", "Perfume Shop", "Pet Service", "Pet Store", "Photography Lab", "Photography Studio", "Piercing Parlor", "Pop-Up Shop",
						"Print Shop", "Real Estate Office", "Record Shop", "Recording Studio", "Recycling Facility", "Rental Service", "Salon / Barbershop", 
						"Shipping Store", "Shoe Repair", "Shopping Mall", "Ski Shop", "Smoke Shop", "Smoothie Shop", "Souvenir Shop", "Spa", "Sporting Goods Shop",
						"Stationery Store", "Storage Facility", "Tailor Shop", "Tanning Salon", "Tattoo Parlor", "Thrift / Vintage Store", "Toy / Game Store", 
						"Travel Agency", "Used Bookstore", "Vape Store", "Video Game Store", "Video Store", "Warehouse Store", "Watch Shop"), 

					array("Airport", "Bike Rental / Bike Share", "Boat or Ferry", "Border Crossing", "Bus Station", "Bus Stop", "Cable Car", "Cruise", "General Travel",
						"Heliport", "Hotel", "Intersection", "Light Rail Station", "Metro Station", "Moving Target", "Pier", "Port", "RV Park", "Rental Car Location",
						"Rest Area", "Road", "Street", "Taxi Stand", "Taxi", "Toll Booth", "Toll Plaza", "Tourist Information Center", "Train Station", "Tram Station",
						"Transportation Service", "Travel Lounge", "Tunnel")
						);

			 $keys = array(array("56aa371be4b08b9a8d5734db","4fceea171983d5d06c3e9823", "4bf58dd8d48988d1e1931735", "4bf58dd8d48988d1e2931735", "4bf58dd8d48988d1e4931735",
						"4bf58dd8d48988d17c941735", "52e81612bcbc57f1066b79e7", "4bf58dd8d48988d18e941735", "5032792091d4c4b30a586d5c", "52e81612bcbc57f1066b79ef",
						"52e81612bcbc57f1066b79e8", "56aa371be4b08b9a8d573532", "4bf58dd8d48988d1f1931735", "52e81612bcbc57f1066b79ea", "4deefb944765f83613cdba6e",
						"52e81612bcbc57f1066b79e6" , "5642206c498e4bfca532186c", "52e81612bcbc57f1066b79eb", "4bf58dd8d48988d17f941735", "4bf58dd8d48988d181941735",
						"4bf58dd8d48988d1e5931735", "4bf58dd8d48988d1f2931735", "4bf58dd8d48988d1e3931735", "507c8c4091d498d9fc8c67a9", "56aa371be4b08b9a8d573514",
						"4bf58dd8d48988d1f4931735", "52e81612bcbc57f1066b79e9", "52e81612bcbc57f1066b79ec", "56aa371be4b08b9a8d5734f9", "4bf58dd8d48988d184941735",
						"4bf58dd8d48988d182941735", "56aa371be4b08b9a8d573520", "4bf58dd8d48988d193941735", "4bf58dd8d48988d17b941735"),
						
					array("4bf58dd8d48988d198941735", "4bf58dd8d48988d197941735", "4bf58dd8d48988d1af941735", "4bf58dd8d48988d1b1941735", "4bf58dd8d48988d1a1941735",
						"4bf58dd8d48988d1a0941735", "4bf58dd8d48988d1b2941735", "4bf58dd8d48988d1a5941735", "4bf58dd8d48988d1a7941735", "4bf58dd8d48988d1aa941735",
						"4bf58dd8d48988d1a9941735", "4bf58dd8d48988d1a3941735", "4bf58dd8d48988d1b4941735", "4bf58dd8d48988d1ac941735", "4bf58dd8d48988d1a2941735",
						"4bf58dd8d48988d1b0941735", "4bf58dd8d48988d1a8941735", "4bf58dd8d48988d1a6941735", "4bf58dd8d48988d1b3941735", "4bf58dd8d48988d141941735",
						"4bf58dd8d48988d1ab941735", "4bf58dd8d48988d1ad941735", "4bf58dd8d48988d1ae941735"),
						
					array("52f2ab2ebcbc57f1066b8b3b", "5267e4d9e4b0ec79466e48c6", "5267e4d9e4b0ec79466e48c9", "5267e4d9e4b0ec79466e48c7", "5267e4d9e4b0ec79466e48d1",
						"5267e4d9e4b0ec79466e48c8", "52741d85e4b0d5d1e3c6a6d9", "52f2ab2ebcbc57f1066b8b54", "5267e4d8e4b0ec79466e48c5"),

					array("503288ae91d4c4b30a586d67", "4bf58dd8d48988d1c8941735", "4bf58dd8d48988d14e941735", "4bf58dd8d48988d142941735", "4bf58dd8d48988d169941735",
						"52e81612bcbc57f1066b7a01", "4bf58dd8d48988d1df931735", "4bf58dd8d48988d179941735", "4bf58dd8d48988d16a941735", "52e81612bcbc57f1066b7a02",
						"52e81612bcbc57f1066b79f1", "4bf58dd8d48988d16b941735", "4bf58dd8d48988d143941735", "52e81612bcbc57f1066b7a0c", "52e81612bcbc57f1066b79f4",
						"4bf58dd8d48988d16c941735", "4bf58dd8d48988d128941735", "4bf58dd8d48988d16d941735", "4bf58dd8d48988d17a941735", "4bf58dd8d48988d144941735",
						"5293a7d53cf9994f4e043a45", "4bf58dd8d48988d1e0931735", "52e81612bcbc57f1066b7a00", "52e81612bcbc57f1066b79f2", "52f2ae52bcbc57f1066b8b81",
						"4bf58dd8d48988d146941735", "4bf58dd8d48988d1d0941735", "4bf58dd8d48988d147941735", "4bf58dd8d48988d148941735", "4bf58dd8d48988d108941735",
						"4bf58dd8d48988d109941735", "52e81612bcbc57f1066b7a05", "4bf58dd8d48988d10b941735", "4bf58dd8d48988d16e941735", "4edd64a0c7ddd24ca188df1a",
						"52e81612bcbc57f1066b7a09", "4bf58dd8d48988d120951735", "56aa371be4b08b9a8d57350b", "4bf58dd8d48988d1cb941735", "4bf58dd8d48988d10c941735",
						"4d4ae6fc7a7b7dea34424761", "55d25775498e9f6a0816a37a", "4bf58dd8d48988d155941735", "4bf58dd8d48988d10d941735", "4c2cd86ed066bed06c3c5209",
						"4bf58dd8d48988d10e941735", "52e81612bcbc57f1066b79ff", "52e81612bcbc57f1066b79fe", "4bf58dd8d48988d16f941735", "52e81612bcbc57f1066b79fa", 
						"4bf58dd8d48988d10f941735", "52e81612bcbc57f1066b7a06", "4bf58dd8d48988d110941735", "52e81612bcbc57f1066b79fd",	"4bf58dd8d48988d112941735", 
						"4bf58dd8d48988d1be941735", "4bf58dd8d48988d1bf941735", "4bf58dd8d48988d1c0941735", "4bf58dd8d48988d1c1941735", "4bf58dd8d48988d115941735", 
						"52e81612bcbc57f1066b79f9", "4bf58dd8d48988d1c2941735", "52e81612bcbc57f1066b79f8", "56aa371be4b08b9a8d573508", "4bf58dd8d48988d1ca941735", 
						"52e81612bcbc57f1066b7a04", "4def73e84765ae376e57713a", "56aa371be4b08b9a8d5734c7", "4bf58dd8d48988d1c4941735", "5293a7563cf9994f4e043a44", 
						"4bf58dd8d48988d1bd941735", "4bf58dd8d48988d1c5941735", "4bf58dd8d48988d1c6941735", "4bf58dd8d48988d1ce941735", "56aa371be4b08b9a8d57355a", 
						"4bf58dd8d48988d1c7941735", "4bf58dd8d48988d1dd931735", "4bf58dd8d48988d1cd941735", "4bf58dd8d48988d14f941735", "4bf58dd8d48988d150941735", 
						"5413605de4b0ae91d18581a9", "4bf58dd8d48988d1cc941735", "4bf58dd8d48988d158941735", "4bf58dd8d48988d1dc931735", "56aa371be4b08b9a8d573538", 
						"4f04af1f2fb6e1c99f3db0bb", "52e928d0bcbc57f1066b7e96", "4bf58dd8d48988d1d3941735", "4bf58dd8d48988d14c941735"),

					array("4bf58dd8d48988d116941735", "50327c8591d4c4b30a586d5d", "4bf58dd8d48988d121941735", "53e510b7498ebcb1801b55d4", "4bf58dd8d48988d11f941735",
						"4bf58dd8d48988d11a941735", "4bf58dd8d48988d1d4941735", "4bf58dd8d48988d1d6941735"),

					array("4f4528bc4b90abdf24c9de85", "52e81612bcbc57f1066b7a27", "52e81612bcbc57f1066b7a28", "56aa371be4b08b9a8d573544", "4bf58dd8d48988d1e2941735",
						"56aa371be4b08b9a8d57355e", "52e81612bcbc57f1066b7a22", "4bf58dd8d48988d1df941735", "4bf58dd8d48988d1e4941735", "56aa371be4b08b9a8d57353b",
						"56aa371be4b08b9a8d573562", "50aaa49e4b90af0d42d5de11", "56aa371be4b08b9a8d573511", "4bf58dd8d48988d15c941735", "52e81612bcbc57f1066b7a12",
						"4bf58dd8d48988d1e5941735", "4bf58dd8d48988d15b941735", "4bf58dd8d48988d15f941735", "52e81612bcbc57f1066b7a0f", "52e81612bcbc57f1066b7a23",
						"56aa371be4b08b9a8d573547", "4bf58dd8d48988d15a941735", "52e81612bcbc57f1066b7a11",	"4bf58dd8d48988d1e0941735", "4bf58dd8d48988d160941735",
						"50aaa4314b90af0d42d5de10", "4bf58dd8d48988d161941735", "4bf58dd8d48988d15d941735", "4eb1d4d54b900d56c88a45fc", "52e81612bcbc57f1066b7a21",
						"52e81612bcbc57f1066b7a13", "4bf58dd8d48988d162941735", "52e81612bcbc57f1066b7a14",	"4bf58dd8d48988d163941735", "52e81612bcbc57f1066b7a25",
						"4bf58dd8d48988d1e7941735", "4bf58dd8d48988d164941735", "4bf58dd8d48988d15e941735", "52e81612bcbc57f1066b7a29", "52e81612bcbc57f1066b7a26",
						"56aa371be4b08b9a8d573541", "4eb1d4dd4b900d56c88a45fd", "50328a4b91d4c4b30a586d6b",	"4bf58dd8d48988d165941735", "4bf58dd8d48988d166941735",
						"4bf58dd8d48988d1e9941735", "4eb1baf03b7b2c5b1d4306ca", "530e33ccbcbc57f1066bbfe4", "52e81612bcbc57f1066b7a10", "4bf58dd8d48988d159941735",
						"52e81612bcbc57f1066b7a24", "4bf58dd8d48988d1de941735", "5032848691d4c4b30a586d61", "56aa371be4b08b9a8d573560", "56aa371be4b08b9a8d5734c3",
						"4fbc1be21983fc883593e321"), 
						
					array("4e52d2d203646f7c19daa8ae", "4bf58dd8d48988d173941735", "56aa371be4b08b9a8d5734cf", "4bf58dd8d48988d130941735", "56aa371be4b08b9a8d573517",
						"52e81612bcbc57f1066b7a35", "52e81612bcbc57f1066b7a34", "4bf58dd8d48988d1ff931735", "52e81612bcbc57f1066b7a32", "4e0e22f5a56208c4ea9a85a0",
						"52e81612bcbc57f1066b7a37", "4bf58dd8d48988d171941735", "4eb1bea83b7b6f98df247e06", "4eb1daf44b900d56c88a4600", "4f4534884b9074f6e4fb0174",
						"4bf58dd8d48988d126941735", "56aa371be4b08b9a8d5734d7", "4bf58dd8d48988d12f941735", "4bf58dd8d48988d104941735", "4e52adeebd41615f56317744",
						"50328a8e91d4c4b30a586d6c", "4bf58dd8d48988d124941735", "4c38df4de52ce0d596b336e1", "4bf58dd8d48988d172941735", "5310b8e5bcbc57f1066bcbf1",
						"5032856091d4c4b30a586d63", "52f2ab2ebcbc57f1066b8b57", "4bf58dd8d48988d13b941735", "52e81612bcbc57f1066b7a33", "4bf58dd8d48988d131941735",
						"52e81612bcbc57f1066b7a31", "4cae28ecbf23941eb1190695", "52e81612bcbc57f1066b7a36", "56aa371be4b08b9a8d5734c5", "4bf58dd8d48988d14b941735"),

					array("5032891291d4c4b30a586d68", "4bf58dd8d48988d103941735", "4f2a210c4b9023bd5841ed28", "4d954b06a243a5684965b473", "52f2ab2ebcbc57f1066b8b55"),

					array("52f2ab2ebcbc57f1066b8b56", "5267e446e4b0ec79466e48c4", "4bf58dd8d48988d116951735", "4bf58dd8d48988d127951735", "52f2ab2ebcbc57f1066b8b43",
						"52f2ab2ebcbc57f1066b8b44", "56aa371be4b08b9a8d5734d3", "4bf58dd8d48988d124951735", "52f2ab2ebcbc57f1066b8b32", "4bf58dd8d48988d10a951735",
						"56aa371be4b08b9a8d5734cb", "52f2ab2ebcbc57f1066b8b40", "52f2ab2ebcbc57f1066b8b42", "4bf58dd8d48988d115951735", "4bf58dd8d48988d1f1941735",
						"4bf58dd8d48988d114951735", "4bf58dd8d48988d11a951735", "5453de49498eade8af355881", "4eb1bdf03b7b55596b4a7491", "4bf58dd8d48988d117951735",
						"4eb1c1623b7b52c0e1adc2ec", "4f04ae1f2fb6e1c99f3db0ba", "52f2ab2ebcbc57f1066b8b2a", "52f2ab2ebcbc57f1066b8b2d", "52f2ab2ebcbc57f1066b8b31",
						"4bf58dd8d48988d103951735", "52f2ab2ebcbc57f1066b8b18", "5454144b498ec1f095bff2f2", "4d954b0ea243a5684a65b473", "4bf58dd8d48988d10c951735",
						"52f2ab2ebcbc57f1066b8b17", "5032850891d4c4b30a586d62", "4f4532974b9074f6e4fb0104", "4bf58dd8d48988d1f6941735", "4bf58dd8d48988d1f4941735",
						"52dea92d3cf9994f4e043dbb", "52f2ab2ebcbc57f1066b8b1a", "4bf58dd8d48988d10f951735", "52f2ab2ebcbc57f1066b8b1d", "5032872391d4c4b30a586d64",
						"4bf58dd8d48988d122951735", "56aa371be4b08b9a8d573554", "5454152e498ef71e2b9132c6", "52f2ab2ebcbc57f1066b8b26", "56aa371be4b08b9a8d573523",
						"503287a291d4c4b30a586d65", "52f2ab2ebcbc57f1066b8b3a", "52f2ab2ebcbc57f1066b8b16", "4bf58dd8d48988d1f7941735", "56aa371be4b08b9a8d573505",
						"4bf58dd8d48988d11b951735", "4bf58dd8d48988d1f9941735", "52f2ab2ebcbc57f1066b8b24", "52f2ab2ebcbc57f1066b8b1c", "4bf58dd8d48988d1f8941735",
						"4bf58dd8d48988d18d941735", "4eb1c0253b7b52c0e1adc2e9", "4bf58dd8d48988d113951735", "4bf58dd8d48988d128951735", "52f2ab2ebcbc57f1066b8b19",
						"4bf58dd8d48988d112951735", "54541900498ea6ccd0202697", "52f2ab2ebcbc57f1066b8b2c", "4bf58dd8d48988d1fb941735", "545419b1498ea6ccd0202f58",
						"50aaa5234b90af0d42d5de12", "52f2ab2ebcbc57f1066b8b36", "4bf58dd8d48988d1f0941735", "4bf58dd8d48988d111951735", "52f2ab2ebcbc57f1066b8b25",
						"52f2ab2ebcbc57f1066b8b33", "4bf58dd8d48988d1fc941735", "52f2ab2ebcbc57f1066b8b3f", "52f2ab2ebcbc57f1066b8b2b", "52f2ab2ebcbc57f1066b8b1e",
						"52f2ab2ebcbc57f1066b8b38", "52f2ab2ebcbc57f1066b8b29", "52c71aaf3cf9994f4e043d17", "50be8ee891d4fa8dcc7199a7", "52f2ab2ebcbc57f1066b8b3c",
						"52f2ab2ebcbc57f1066b8b27", "4bf58dd8d48988d1ff941735", "4f04afc02fb6e1c99f3db0bc", "56aa371be4b08b9a8d57354a", "5032833091d4c4b30a586d60",
						"4bf58dd8d48988d1fe941735", "4f04aa0c2fb6e1c99f3db0b8", "4f04ad622fb6e1c99f3db0b9", "4d954afda243a5684865b473", "52f2ab2ebcbc57f1066b8b2f",
						"52f2ab2ebcbc57f1066b8b22", "52f2ab2ebcbc57f1066b8b35", "4bf58dd8d48988d121951735", "52f2ab2ebcbc57f1066b8b34", "52f2ab2ebcbc57f1066b8b23",
						"5032897c91d4c4b30a586d69", "4bf58dd8d48988d100951735", "4eb1bdde3b7b55596b4a7490", "554a5e17498efabeda6cc559", "52f2ab2ebcbc57f1066b8b20", 
						"52f2ab2ebcbc57f1066b8b3d", "52f2ab2ebcbc57f1066b8b28", "5032885091d4c4b30a586d66", "4bf58dd8d48988d10d951735", "52f2ab2ebcbc57f1066b8b37",
						"4f4531084b9074f6e4fb0101", "56aa371be4b08b9a8d573552", "4bf58dd8d48988d110951735", "52f2ab2ebcbc57f1066b8b1f", "52f2ab2ebcbc57f1066b8b39",
						"4bf58dd8d48988d1fd941735", "56aa371be4b08b9a8d573566", "4bf58dd8d48988d123951735", "52f2ab2ebcbc57f1066b8b41", "52f2ab2ebcbc57f1066b8b1b",
						"4bf58dd8d48988d1ed941735", "4bf58dd8d48988d1f2941735", "52f2ab2ebcbc57f1066b8b21", "4f04b1572fb6e1c99f3db0bf", "5032781d91d4c4b30a586d5b",
						"4d1cf8421a97d635ce361c31", "4bf58dd8d48988d1de931735", "4bf58dd8d48988d101951735", "4bf58dd8d48988d1f3941735", "4f04b08c2fb6e1c99f3db0bd",
						"52f2ab2ebcbc57f1066b8b30", "56aa371be4b08b9a8d57355c", "4bf58dd8d48988d10b951735", "4bf58dd8d48988d126951735", "52e816a6bcbc57f1066b7a54",
						"52f2ab2ebcbc57f1066b8b2e"), 

					array("4bf58dd8d48988d1ed931735", "4e4c9077bd41f78e849722f9", "4bf58dd8d48988d12d951735", "52f2ab2ebcbc57f1066b8b4b", "4bf58dd8d48988d1fe931735",
						"52f2ab2ebcbc57f1066b8b4f", "52f2ab2ebcbc57f1066b8b50", "55077a22498e5e9248869ba2", "4bf58dd8d48988d1f6931735", "56aa371ce4b08b9a8d57356e",
						"4bf58dd8d48988d1fa931735", "52f2ab2ebcbc57f1066b8b4c", "4bf58dd8d48988d1fc931735", "4bf58dd8d48988d1fd931735", "4f2a23984b9023bd5841ed2c", 
						"4e74f6cabd41c4836eac4c31", "56aa371be4b08b9a8d57353e", "52f2ab2ebcbc57f1066b8b53", "4bf58dd8d48988d1ef941735", "4d954b16a243a5684b65b473",
						"4bf58dd8d48988d1f9931735", "52f2ab2ebcbc57f1066b8b52", "53fca564498e1a175f32528b", "4bf58dd8d48988d130951735", "52f2ab2ebcbc57f1066b8b4d", 
						"52f2ab2ebcbc57f1066b8b4e", "4f4530164b9074f6e4fb00ff", "4bf58dd8d48988d129951735", "52f2ab2ebcbc57f1066b8b51", "54541b70498ea6ccd0204bff",
						"4f04b25d2fb6e1c99f3db0c0", "52f2ab2ebcbc57f1066b8b4a")
						);
	$argu = array(); //declaring an empty array so that we can push the submitted values.

	//print_r($_POST); 	//prints the array containing all the names of checked items as indices and their values.
					    //mostly looks like an associative array.

	$msg = "hi";

	$diversity = array();
	$radiusOfGyration = array();
	$relevancy = array();
	$modelsSelected = array();
	$pageRankNum=0;
	/*
	$prevDiversity = array();
	$prevRadiusOfGyration = array();
	$prevRelevancy = array();
	$prevModelsSelected = array();*/

	//if(!isset($_SESSION)){
	//If session has started .. do this
	//If removed comments..compare functionaliy won't work coz we are assigning session variables an empty array
	/*
	if (session_status() == PHP_SESSION_NONE) {
		$_SESSION['divArr'] = array();
		$_SESSION['relArr'] = array();
		$_SESSION['rogArr'] = array();
		$_SESSION['mdsArr'] = array();
	}*/
	error_reporting(0);
	if(!isset($_SESSION['mdsArr'])){
			$prevDiversity = array();
			$prevRelevancy = array();
			$prevRadiusOfGyration = array();
			$prevModelsSelected = array();	
			$prevRunTime = array();
	}
	
	if( (!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ){

		//Add the loading gif
		echo"<script type = 'text/javascript'>
				function setLoadingImgVisible(){
					if(document.getElementById('map')){
					document.getElementById('map').style.visibility = 'hidden';
					document.getElementById('loadingImg').style.visibility = 'visible';							
					}
				}
				setLoadingImgVisible();
			</script>";

			
		//Storing the previous stats	
		if(isset($_SESSION)){
			$prevDiversity = $_SESSION['divArr'];
			$prevRelevancy = $_SESSION['relArr'];
			$prevRadiusOfGyration = $_SESSION['rogArr'];
			$prevModelsSelected = $_SESSION['mdsArr'];
			$prevRunTime = $_SESSION['rtArr'];
		}
		

		//echo $_POST['customize'];
		//To detect errors
		$errorFlag = false;
		$profileFlag = false;
		if(empty($_POST['lat']) || empty($_POST['lon']) || empty($_POST['radius']) || empty($_POST['numVenues']) ){
			//$errorFlag = true;
		}
		else{
			array_push($argu, $_POST['lat']);
			array_push($argu, $_POST['lon']);
			array_push($argu, $_POST['radius']);
			array_push($argu, $_POST['numVenues']);
			if(empty($_POST['algo0'])){
				$_POST['algo0'] = $_get['algo123'];
			}
			array_push($argu, $_POST['algo0']);
			array_push($argu, ";");			
		}
		
		
		if(empty($_POST['CBOne']) && empty($_POST['CBThree'])){
			echo "its false here";
			//$errorFlag = true;
		}
		else{
			if(!empty($_POST['CBThree'])){
				array_push($argu, "1");
				$profileFlag = true;
			}
			else{
				foreach($_POST['CBOne'] as $t){
					array_push($argu, $t);
				}											
			}
		}
		array_push($argu, ";");

		
		


		//added for All Venues
		$allVenuesValue = 'FALSE';
		if(!empty($_POST['CBTwoAllVenues'])){
			//echo "Top";
			$allVenuesValue = 'TRUE';
		}
		//$argu4 = array();
		//array_push($argu4, $allVenuesValue);

		//check if random selection is present in models, if not add it and add the value false 

		if($profileFlag){
			array_push($argu, ";");
			//print_r($_POST['CBThree']);
			foreach ($_POST['CBThree'] as $t) {
				//echo($t);
				array_push($argu, $t);
				//break //comes out after one value--as our program works with only one profile
			}
		} 

		if($_POST['customizeText'] == 1){
			//echo "adding customized keys";
			//echo "<br>";
			$argu2 = array();
			//$argu3 = array();
			//print_r($_POST);
			/*
			for($i= 0 ; $i < 1 ; $i++){
				foreach($_POST["$level1[$i]"] as $t){
					array_push($argu2, $t);
				}
			}
			for($i= 0 ; $i < 1 ; $i++){
				for($j=0;$j<sizeof($keys[$i]); $j++){
					array_push($argu3, $keys[$i][$j]);
				}
				
			}
			*/
			for($i= 0 ; $i < sizeof($level1) ; $i++){
				foreach($_POST["$level1[$i]"] as $t){
					array_push($argu2, $t);
				}
			}
			/*
			for($i= 0 ; $i < sizeof($level1) ; $i++){
				for($j=0;$j<sizeof($keys[$i]); $j++){
					array_push($argu3, $keys[$i][$j]);
				}
				
			}*/
			//print_r($argu2);
			//echo "YoYo<br>";
			//print_r($argu3);
		}
			

		//array_push($argu, ";");
		//echo("<br>");
		//print_r($argu);
		/*
		for($i = 0; $i<sizeof($argu); $i++){
			if(empty($argu[$i])){
				$errorFlag = true;
			}
		}
		*/

		if($errorFlag){
			echo "<script> alert(\"Dont leave any empty fields please!!\")</script>";
		}
		else{
			
			$para = implode(",", $argu);
			//echo $para;
			//echo "<br>";
			//If it is customized, send three agruments
			if($_POST['customizeText'] == 1){
				//echo("<br>");
				//echo "in if, sending 3 parameters";
				//echo("<br>");
				$bias = implode(",", $argu2);
				//$keys = implode(",", $argu3);
				//echo $bias;
				//echo "<br>";
				//echo $keys;
				exec("javac -cp ./java-json;. Client.java");
				exec("java -cp ./java-json;. Client $para $allVenuesValue $bias", $output, $return_var);
				//echo $return_var;
				//echo("<br>");
				
			}
			else{
				//echo("<br>");
				//echo "in else, sending 1 parameters";
				//echo("<br>");
				echo $para;
				echo "HELLO";
				//echo exec("java -cp ./java-json;. Test $para");
				exec("javac -cp ./java-json;. Client.java");
				exec("java -cp ./java-json;. Client $para $allVenuesValue", $output);				
			}
			//echo("<br>");
			//print_r($output);
		
			//Remove the loading gif
			echo"<script type = 'text/javascript'>
				function setLoadingImgInvisible(){
					if(document.getElementById('map')){
					document.getElementById('map').style.visibility = 'visible';
					document.getElementById('loadingImg').style.visibility = 'hidden';
					}
				}
				setLoadingImgInvisible();
			</script>";

			//print_r($output);
			//echo "done with output array <br>";
			
			$outArray = json_decode($output[0], true);

			
			
			$model = array();
			$runTime = array();
			$topK = array();
			$UserLocation = array();
			$venueName = array();
			$venueLocation = array();
			$dontStore = false;
			$dontGoAgain = true;
			//value1 has only one value that is the WHOLE RESULT
			foreach ($outArray as $mainResults => $value1) {
				# code...
				//echo $mainResults."1\n";
				//value2 has model number
				foreach ($value1 as $modelNumber => $value2) {
					# code...
					//echo $modelNumber."2\n";
					//value3 contains all the result attributes for a model
					foreach ($value2 as $modelResults => $value3) {
						# code...
						//echo $modelResults."3\n";
						//echo $value3;
						//echo "<br>";
						//if($dontGoAgain && strcmp($value3,"AllVenues")==0){
						if($dontGoAgain && $value3 === 'AllVenues'){
							//echo "AllVenues found in result: ".$modelResults."  value :".$value3."<br>";
							$dontStore = true;
							$relAV = array_pop($relevancy);
							//echo "relevancy for AV: ".$relAV;
							$dontGoAgain = false;
						}
						if($dontStore){
							//echo "<br>in dontStore: ".$value3;
							
							if($modelResults === 'Model'){
								$modelAV = $value3;
								//echo "model for AV: ".$modelAV;
							}
							if($modelResults === 'runtime'){
								$runTimeAV = $value3;
								//echo "RT for AV: ".$runTimeAV;
							}
							if($modelResults === 'TopK'){
								$topKAV =  $value3;
								//echo "TopK for AV: ".$topKAV;
							}
							if($modelResults === 'Diversity'){
								$diversityAV = $value3;
								//echo "div for AV: ".$diversityAV;
							}
							if($modelResults === 'radiusOfGyration'){
								$radiusOfGyrationAV = $value3;
								//echo "ROG for AV: ".$radiusOfGyrationAV;
							}
							//echo "<br>";
						}
						if(!$dontStore){
							//echo "In if ds<br>";
							if($modelResults === 'Relevnecy')
								array_push($relevancy, $value3);
							if($modelResults === 'Model')
								array_push($model, $value3);
							if($modelResults === 'UserLocation')
								array_push($UserLocation, $value3);
							if($modelResults === 'runtime')
								array_push($runTime, $value3);
							if($modelResults === 'TopK')
								array_push($topK, $value3);
							if($modelResults === 'Diversity')
								array_push($diversity, $value3);
							if($modelResults === 'radiusOfGyration')
								array_push($radiusOfGyration, $value3);

							if($modelResults === 'results')
							{
								//echo "In ifif ds<br>";
								//valueLocation contains name and location(lat,lng)
								foreach ($value3 as $location => $value4) {
									# code...
									//array_push($location, $location['venueName']);
									//echo $location."4\n";
									//value5 contains an array of venueName and venueLocation
									foreach ($value4 as $nameNLocation => $value5) {
										# code...
										//echo $nameNLocation."5\n";
										if($nameNLocation === 'VenueName'){
											array_push($venueName, $value5);
											//echo "location name: ".$value5."<br>";
										}
										if($nameNLocation === 'VenueLocation')
											array_push($venueLocation, $value5);
									}
								}				
							}

						}
						
					}
					$dontStore = false;
					
				}
			}
			/*
			echo "<br>";
			print_r($relevancy);
			echo "<br>";
			print_r($model);
			echo "<br>";
			print_r($UserLocation);
			echo "<br>";
			print_r($runTime);
			echo "<br>";
			print_r($topK);
			echo "<br>";
			print_r($radiusOfGyration);
			echo "<br>";
			*/
			//print_r($venueName);
			//echo "<br>";
			/*
			print_r($venueLocation);
			echo "<br>";
			
			print_r($modelsSelected);
			*/
			$_SESSION['divArr'] = $diversity;
			$_SESSION['relArr'] = $relevancy;
			$_SESSION['rogArr'] = $radiusOfGyration;
			$_SESSION['mdsArr'] = $modelsSelected;
			$_SESSION['rtArr'] = $runTime;

			
		}

	}



	$tst="yeah";

?>
	<head> 
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
		<title> MPG recommended locations</title> 

		<!-- Style sheets added-->
		<link href="css/styleScratch.css" rel="stylesheet" type="text/css" media="all" />
		<!--Popup's css-->
		<link href="css/popup.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="css/rb-switcher.min.css"/>
		<!--Google fonts-->
		
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
		

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
		<!--jQuery added-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
		<!--Slideout tabs javascript added-->
		<script src="js/jquery.tabSlideOut.v1.3.js"></script>	
		<!--Methods.js added-->
		<!--<script src="js/functions.js"></script>-->
		<!-- Plotly.js -->
	  	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
		
		<script src="js/AnchorPosition.js" type="text/javascript"></script>

		<script src="js/PopupWindow.js" type="text/javascript"></script>

		<script src = "js/oms.min.js"></script>

		<script type="text/javascript">
			
			$(function(){

				$("#loader").fadeOut("fast");

				$('.slide-out-div-topLeft').tabSlideOut({
					tabHandle: '.handleTopLeft',                              //class of the element that will be your tab
					pathToTabImage: 'images/tabs/Input.png',          //path to the image for the tab (optionaly can be set using css)
					imageHeight: '18%',                               //height of tab image
					imageWidth: '14%',                               //width of tab image    
					tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
					speed: 300,                                        //speed of animation
					action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
					topPos: '74px',                                   //position from the top
					fixedPosition: false,                           //options: true makes it stick(fixed position) on scroll
					handleTop: 45
				});

				$('.slide-out-div-bottomLeft').tabSlideOut({
					tabHandle: '.handleBottomLeft',                             
					pathToTabImage: 'images/tabs/Profiles.png',          
					imageHeight: '39%',                           
					imageWidth: '14%',                           
					tabLocation: 'left',                    
					speed: 300,                                      
					action: 'click',                            
					topPos: '180px',                               
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 80                  
				});
				$('.slide-out-div-bottomLeft1').tabSlideOut({
					tabHandle: '.handleBottomLeft1',                             
					pathToTabImage: 'images/tabs/Algorithms.png',          
					imageHeight: '19%',                           
					imageWidth: '14%',                           
					tabLocation: 'left',                    
					speed: 300,                                      
					action: 'click',                            
					topPos: '10%',                               
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 350                  
				});

				$('.slide-out-div-topRight').tabSlideOut({
					tabHandle: '.handleTopRight',                             
					pathToTabImage: 'images/tabs/Path.png',          
					imageHeight: '20%',                               
					imageWidth: '7%',                               
					tabLocation: 'right',                               
					speed: 300,                                    
					action: 'click', 
					topPos: '74px',  
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 35
				})

				$('.slide-out-div-bottomRight').tabSlideOut({
					tabHandle: '.handleBottomRight',
					pathToTabImage: 'images/tabs/Analysis.png',
					imageHeight: '25%',
					imageWidth: '8%',
					tabLocation: 'right',
					speed: 300,
					action: 'click',
					topPos: '130px',
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 140,
				});
			
			
			    //Popup OPEN --For scatter plot
			    $('[data-popup-open]').on('click', function(e)  {
			        var targeted_popup_class = jQuery(this).attr('data-popup-open');
			        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
			 
			        e.preventDefault();

			    });
			 
			    //Popup CLOSE
			    $('[data-popup-close]').on('click', function(e)  {
			        var targeted_popup_class = jQuery(this).attr('data-popup-close');
			        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
			 
			        e.preventDefault();
			    });

			    //Popup OPEN --For customization
			    $('[level-popup-open]').on('click', function(e)  {
			        var targeted_popup_class = jQuery(this).attr('level-popup-open');
			        $('[level-popup="' + targeted_popup_class + '"]').fadeIn(350);
			 
			        e.preventDefault();

			        //calls the method to set the values in customization window
				    setCustomizeValues();
			    });
			 
			    //Popup CLOSE
			    $('[level-popup-close]').on('click', function(e)  {
			        var targeted_popup_class = jQuery(this).attr('level-popup-close');
			        $('[level-popup="' + targeted_popup_class + '"]').fadeOut(350);
			 
			        e.preventDefault();
			        //getCustomizeValues();
			    });

			    //Popup OPEN --For comparison
			    $('[compare-popup-open]').on('click', function(e)  {
			        var targeted_popup_class = jQuery(this).attr('compare-popup-open');
			        $('[compare-popup="' + targeted_popup_class + '"]').fadeIn(350);
			 
			        e.preventDefault();

			        
			    });
			 
			    //Popup CLOSE
			    $('[compare-popup-close]').on('click', function(e)  {
			        var targeted_popup_class = jQuery(this).attr('compare-popup-close');
			        $('[compare-popup="' + targeted_popup_class + '"]').fadeOut(350);
			 
			        e.preventDefault();
			        
			    });
			});

			var numDist = [];
			function topLeftReset(){
				
				document.getElementById("Arts").checked = false;
				document.getElementById("College").checked = false;
				document.getElementById("Event").checked = false;
				document.getElementById("Food").checked = false;
				document.getElementById("Professional").checked = false;
				document.getElementById("Nightlife").checked = false;
				document.getElementById("Outdoors").checked = false;
				document.getElementById("Residence").checked = false;
				document.getElementById("Shop").checked = false;
				document.getElementById("Travel").checked = false;
				group="";
			}
			function bottonLeftReset(){
				
				document.getElementById("ArtLover").checked = false;
				document.getElementById("FoodLover").checked = false;
				document.getElementById("NightLover").checked = false;
				document.getElementById("OutdoorsLover").checked = false;
				document.getElementById("shoppingLover").checked = false;
				
				
			}
			function removeAlgosFromTable(){
				var elmtTable = document.getElementById('emptySpace');
				elmtTable.innerHTML="";
				//document.getElementById("").innerHTML="";
				$("#scatter_tableId td").remove(); 
				algoFlag=true;
				
				
			}
			enableArr=[];
			function topRightReset( removeRows){
				//alert("  yooo  hhhh" );
				prefDivFlag=false;
			pPrefDivFlag=false;
			prefDivFlag2=false;
			pPrefDivFlag2=false;
			pageRankFlag=false;
			disCFlag=false;
			pageRankFlag2=false;
			disCFlag2=false;
			kmedoidFlag=false;
			randomFlag=false;
			kmedoidFlag2=false;
			randomFlag2=false;
			
			
			models=[0,0,0,0,0,0];
			prefDivNum=0;
					pPrefDivNum=0;
					pageRankNum=0;
					disCNum=0;
					kmedoidNum=0;
					randomNum=0;
					prefDivLambda=[];
				prefDivAlpha=[];
				prefDivSigma=[];
				pPrefDivLambda=[];
				pPrefDivAlpha=[];
				pPrefDivSigma=[];
				pageRankLambda=[];
				pageRankAlpha=[];
				pageRankSigma=[];
				disCLambda=[];
				disCAlpha=[];
				disCSigma=[];
				kmedoidLambda=[];
				kmedoidAlpha=[];
				kmedoidSigma=[];
				randomLambda=[];
				randomAlpha=[];
				randomSigma=[];
				custonModels="off";
				customModelsNames=[];
				if (removeRows == 1){
					removeAlgosFromTable();
					clearMap();
					enableArr=[];
					bottonLeftReset();
					topLeftReset();
					
					enableCounter=0;
				}
				
				
				
			}
			customModelsNames=[];
			//customNumber=[[]];
			var walk;
			serverResult=[];
			var custonModels="off";
			prefDivFlag=false;
			pPrefDivFlag=false;
			prefDivFlag2=false;
			pPrefDivFlag2=false;
			pageRankFlag=false;
			disCFlag=false;
			pageRankFlag2=false;
			disCFlag2=false;
			kmedoidFlag=false;
			randomFlag=false;
			kmedoidFlag2=false;
			randomFlag2=false;
			enableFlag=true;
			models=[0,0,0,0,0,0];
			function openCustomizeAlgo(name){
				//alert("custommmmm  "+name);
				switch(name){
					case "PrefDiv":
					
					prefDivFlag=true;
					break;
					case "pPrefDiv":
					
					pPrefDivFlag=true;
					break;
					case "PageRank":
					
					pageRankFlag=true;
					break;
					case "DisC":
					
					disCFlag=true;
					break;
					case "K-Medoids":
					
					kmedoidFlag=true;
					break;
					case "Random":
					
					randomFlag=true;
					break;
					
				}
				customAlgoModal.style.display = "block";
			}
			function openCustomizeAlgo2(name){
				
				switch(name){
					case "PrefDiv":
					prefDivFlag2=true;
					break;
					case "pPrefDiv":
					pPrefDivFlag2=true;
					break;
					case "PageRank":
					
					pageRankFlag2=true;
					break;
					case "DisC":
					
					disCFlag2=true;
					break;
					case "K-Medoids":
					
					kmedoidFlag2=true;
					break;
					case "Random":
					
					randomFlag2=true;
					break;
				}
				customAlgoModal2.style.display = "block";
			}
		
</script>
		
		

	</head>

	<body>
		<div id = "screen">
				<!--header-->
			<header  class = "banner">
			<!--img src="images/pitt-seal.png"  width="4%" style="margin-left:1%;float:left;"-->
			<!--h1 class="bannerText"> Mobile Personal Guide </h1-->
			<img  src="images/tabs/Logo2.png"  width ="100%" onclick = "event.preventDefault()"/>
			
				
			
			</header>
			<div id="loader" style="display:none;"><img src="images/loading.gif" ></div>
			<div>
				<div id = "map">
				</div> 
				<!--<div id="loadingImg" style="display:none;height:10%;width:10%;align:center">
	    				<img src="images/loading.gif">
				</div>-->
			</div>

			<footer style="background:#52658f; margin-bottom :0px;z-index: 0.9;height:20%;width:100%;padding-top: 8px;" >
			<a class="link" style="color:white;margin-left:1%;text-decoration: none; float:left;"  href="#">(c) 2015 - 2017</a>
			
			<a class="link" style="margin-left:35%;color:white;margin-top:12%;text-decoration: none;" target="_blank"  href="https://docs.google.com/forms/d/e/1FAIpQLScUH_cyzmch1_5lX6QirLaLTLfvnAt4adhwMN060djrCfHJSg/viewform">Feedback</a>
			|
			<button class="link" style="color:white ;margin-left:20%;text-decoration: none;font-weight: bold;font-size:16px; background:none;
    border:none;
    margin:0;
    padding:0"   id="contributors" onClick="showModal()">Contributors</button>
			
			<a class = "footer" target="_blank"  onclick = "event.preventDefault()">
					
			</a>
			</footer>	
			<form id = "ALL" name = "ALL" action = "" method = "POST">
				<div class="slide-out-div-topLeft">
					<a class="handleTopLeft" href="http://link-for-non-js-users">Content</a>

					<!--<form id = "topLeft" name = "topLeft">-->
						<label class = "small" id="small" title="Specify the City of Your Location of Interest">City:</label>
						<select class = textbox id = "city" name="city" onChange = "initMap()">
						
							<option value="SanFrancisco">San Francisco</option>
		    				<option value="NewYork">New York</option>
		    				<!--<option value="NewDelhi">New Delhi</option>-->
		  				</select><br><br>
						<label title = "Enter the Coordinates or Drag the Location Marker to Your Starting Position">Position:</label>
						<span style="display:inline-block; width: 27;"></span>
						<input class = "textbox" id = "lat" type = "text" name = "lat" size = 5>
						<input class = "textbox" id = "lon" type = "text" name = "lon" size = 5>
						<br><br>
						<label title = "Specify the Radial Distance You are Willing to Travel">Radius:</label>
						<input class = "textbox" type = "text" id = "radius" name = "radius" size = 11  placeholder="Square kms" style="margin-left:13%">
						<br><br>
						<label title = "Enter the Number of Desired Venues"># Venues:</label>
						<input class = "textbox" type = "text" id = "numVenues" name = "numVenues" size = 11 style="margin-left:9%">
						<br><br>

						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Arts" name="CBOne[]" value="1" onchange='handleGroupChange(this,this.value);' />
							<i></i>
						</label> Arts & Entertainment<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="College" name="CBOne[]" value="2" onchange='handleGroupChange(this,this.value);' />
							<i></i>
						</label> College & University<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Event" name="CBOne[]" value="3" onchange='handleGroupChange(this,this.value);'  />
							<i></i>
						</label> Event<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Food" name="CBOne[]" value="4" onchange='handleGroupChange(this,this.value);' />
							<i></i>
						</label> Food<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Nightlife" name="CBOne[]" value="5" onchange='handleGroupChange(this,this.value);'/>
							<i></i>
						</label> Nightlife Spot<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Outdoors" name="CBOne[]" value="6" onchange='handleGroupChange(this,this.value);'/>
							<i></i>
						</label> Outdoors & Recreation<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Professional" name="CBOne[]" value="7" onchange='handleGroupChange(this,this.value);'/>
							<i></i>
						</label> Professional & Other Places<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Residence" name="CBOne[]" value="8" onchange='handleGroupChange(this,this.value);' />
							<i></i>
						</label> Residence<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Shop" name="CBOne[]" value="9" onchange='handleGroupChange(this,this.value);'/>
							<i></i>
						</label> Shop & Service<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Travel" name="CBOne[]" value="10" onchange='handleGroupChange(this,this.value);'/>
							<i></i>
						</label> Travel & Transport
						
						<br><br>
						<section class="gradient">
						    <!--<input type="submit" name="SubmitTopLeft" value="Submit"/>-->
						    <input type="Button" name="CancelTopLeft" value="Reset" onClick="topLeftReset()" />
						</section>	
				</div>
				<script>
				
				</script>
				

				
				
				<div class = "slide-out-div-bottomLeft">
					<a class = "handleBottomLeft" href = "http://link-for-non-js-users">Content</a><br>
					<!--<form id = "bottomLeft" name = "bottomLeft" action = "api.php" method = "POST">-->
						<label class = "heading">Profiles:</label><br><br>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="ArtLover" value="ArtLover" onchange='handleProfileChange(this,this.id);'/>
							<i></i>
						</label> 
						<label title = "This profile has a bias of 3 for the category Arts & Entertainment"> ArtLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="FoodLover" value="FoodLover" onchange='handleProfileChange(this,this.id);'/>
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Food"> FoodLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="NightLover" value="NightLover"onchange='handleProfileChange(this,this.id);' />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Nightlife Spot"> NightLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="OutdoorsLover" value="OutdoorsLover" onchange='handleProfileChange(this,this.id);'/>
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Outdoors & Recreation"> OutdoorsLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="shoppingLover" value="shoppingLover" onchange='handleProfileChange(this,this.id);'/>
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Shop & Service"> ShoppingLover</label><br><br>


						<section class="gradient">
							    <!--<input type="submit" name="SubmitBottomLeft" value="Submit"/>-->
							    <input type="Button" name="CancelBottomLeft" value="Reset" onClick="bottonLeftReset()"/>
						
						
						<a class="btn" level-popup-open="popup-1" href="#">
							
								<input type="Button" name="CancelBottomLeft" value="Customize" onclick = "setCustomizeText()"/> 
								<input type = "text" name = "customizeText" id = "customizeText" size = "3" value = "0" style="display: none"/>
							</section>	
						</a>
						

						
						<div class="popup1" level-popup="popup-1">
							<div class="popup1-inner" id="popup1-inner">
									
									
								<table class = "table2" id="customize_long_table">
										<?php
										for($j = 0;$j<10;$j++){
									 ?>		
											<th>
											<label style = "font-size: 20px" ><?php echo $level1[$j]; ?> 
											</th>
											<th id="img<?php echo $j ?>" width="9%" onClick="toggleData(<?php echo $j ?>, <?php echo sizeof($level2[$j]) ?>)"> <img src ="images/less.png" width="25%"/> </th>
											
									<?php
											 $k=1;
											for($i=0;$i<sizeof($level2[$j]);$i+=3)
											{ 
									?>			
												<tr id = <?php echo $j; echo $k?>>
												<td><label><?php echo $level2[$j][$i]; ?></label></td>
												<td><input name = "<?php echo $level1[$j]; ?>[]" type = "text" size = 5 value = "1"></td>
												<?php if($i+1<sizeof($level2[$j])){ ?>
												<td><label><?php echo $level2[$j][$i+1]; ?></label></td>
												<td><input name = "<?php echo $level1[$j]; ?>[]" type = "text" size = 5 value = "1"></td>
												<?php } ?>
												<?php if($i+2<sizeof($level2[$j])){ ?>
												<td><label><?php echo $level2[$j][$i+2]; ?></label></td>
												<td><input name = "<?php echo $level1[$j]; ?>[]" type = "text" size = 5 value = "1"></td>
												<?php } ?>
												</tr>																					
											
										<?php
											$k+=1;}
											?>
										
											
											<?php
											
										}
									?>
									

								</table>
								<br><br>
								
								<p><center>
									<a level-popup-close="popup-1" href="#">
										<section class="gradient">
											<!--<input type="submit" name="ConfirmBias" value="Confirm">-->
											<button name="ConfirmBias">Confirm</button>
											<button name='popreset' onclick = "resetValues()">Reset </button>
											
										</section>
									</a>
									<section class="gradient">
									<button   id ="return-to-top" onClick="backToTop()" >Back To Top </button>
									</section>
								</center></p>
								
								<br>
								<a  style="margin-top: 3%;"class="popup1-close" level-popup-close="popup-1" href="#">x</a>
								
								
									
							</div>

						</div>
						
					</div>
				<!-------------------------------------------------------------------------->
				
				<div class = "slide-out-div-bottomLeft1" style="height:60%;	" >
					<a class="handleBottomLeft1" href="http://link-for-non-js-users">Content</a><br>
					<!--<form id = "bottomLeft" name = "bottomLeft" action = "api.php" method = "POST">-->
					<h3 style="margin-top:0px;"><font color="black">Select Required Algorithms:</font></h3>
					<div class="algoBox1" id="algo0" style="height:6%;vertical-align: middle;" onclick="addRowForAlgo('PrefDiv')"><h4 style=" text-align: center;vertical-align: center">PrefDiv</h4></div>
					<div class="algoBox2" id="algo1" style="height:6%;vertical-align: middle;text-align: center;" onclick="addRowForAlgo('pPrefDiv')"><h4 style=" text-align: center;vertical-align: middle;">pPrefDiv</h4></div>	
					<div class="algoBox3" id="algo2" style="height:6%;vertical-align: middle;text-align: center;" onclick="addRowForAlgo('PageRank')"><h4 style=" text-align: center;vertical-align: middle;">PageRank</h4></div>
					<hr/>
					<div class="algoBox1" id="algo3" style="height:6%;" onclick="addRowForAlgo('DisC')"><h4 style=" text-align: center;vertical-align: middle;">DisC</h4></div>
					<div class="algoBox2" id="algo4" style="height:6%;" onclick="addRowForAlgo('K-Medoids')"><h4 style=" text-align: center;vertical-align: middle;">K-Medoids</h4></div>	
					<div class="algoBox3" id="algo5" style="height:6%;" onclick="addRowForAlgo('Random')"><h4 style=" text-align: center;vertical-align: middle;">Random</h4></div>
					<hr/>
					<div id="newAlgoContainer" >
					 
					</div>
					<div id= "algos" style="max-height:55%;overflow:auto;margin-top:1%">
					<div id="emptySpace" height="35%"></div>
						
						
					<!--</form>-->
					
					<br>
						</div>
						<section class="gradient">
							<input type="Button" name="SubmitTopRight" value="Run" onclick="showloader()" />
						    <input type="Button" name="CancelTopRight" value="Reset All" onclick="topRightReset(1)" />
							<br>
							 
						
					<input type="Button" id="AddAlgo" name="AddAlgo" style="width:40%;" value="Add Algorithm" onclick="addAlgoShowModal()" />
					</section>
						
					
					
					
						</div>
				
				
				
			</form>
			
			<script type="text/javascript">
			var profile;
			var group="";
			function handleProfileChange(checkbox,val){
				if(checkbox.checked == true){
					
					profile=val;
					//alert(profile);
				}
			}
			function handleGroupChange(checkbox,val){
				if(checkbox.checked == true){
					//alert(val);
					group+=val+",";
					//alert(profile);
				}
			}
			
				function backToTop(){
					     
					var scrollto = document.getElementById("popup1-inner");
					alert(scrollto);
				
					scrollto.scrollTo(100);
				
				}
				
			
			var statusFolding = "full";
				function toggleData(idNum,len){
					
					//alert("toggle called "+idNum+" "+len);
					var h=1;
					if(statusFolding == "full"){
						while (h < len/3+1){
						var divToHide=document.getElementById(idNum+""+h);
						
						//alert(idNum+""+h);
						divToHide.style.display = "none";
						h+=1;
						
						}
						statusFolding = "less";
						var headTag = document.getElementById("img"+idNum);
						headTag.innerHTML = '<img src ="images/more.png" width="25%"/>';
						
					}else if(statusFolding == "less"){
						while (h < len/3+1){
						var divToHide=document.getElementById(idNum+""+h);
						//alert(idNum+""+h);
						divToHide.style.display = "table-row";
						h+=1;
						
						}
						statusFolding = "full";
						var headTag = document.getElementById("img"+idNum);
						headTag.innerHTML = '<img src ="images/less.png" width="25%"/>';
					}
					
					//var divToHide=document.getElementById(idNum);
					//alert(divToHide);
					//divToHide.style.display = "none";
				}

				function resetValues(){

					setCustomizeValues();
				}
				
				function setCustomizeText(){
					document.getElementById('customizeText').value = '1';
				}

				//sets the bias for the selected profiles in customize profile menu
				function setCustomizeValues(){
							//alert("second: "+document.getElementById('ArtLover').checked);

							if(document.getElementById('ArtLover').checked){
								var x = document.getElementsByName('Arts&Entertainment[]');
								for(var i=0;i<x.length;i++)
									x[i].value = "3";
							}
							if(document.getElementById('FoodLover').checked){
								var x = document.getElementsByName('Food[]');
								for(var i=0;i<x.length;i++)
									x[i].value = "3";	
							}
							if(document.getElementById('NightLover').checked){
								var x = document.getElementsByName('NightlifeSpot[]');
								for(var i=0;i<x.length;i++)
									x[i].value = "3";
							}
							if(document.getElementById('OutdoorsLover').checked){
								var x = document.getElementsByName('Outdoors&Recreation[]');
								for(var i=0;i<x.length;i++)
									x[i].value = "3";
							}
							if(document.getElementById('shoppingLover').checked){
								var x = document.getElementsByName('Shop&Service[]');
								for(var i=0;i<x.length;i++)
									x[i].value = "3";
							}

							
							var x = document.getElementsByName('College&University[]');
							for(var i=0;i<x.length;i++)
									x[i].value = "1";
							x = document.getElementsByName('Event[]');
							for(var i=0;i<x.length;i++)
									x[i].value = "1";
							x = document.getElementsByName('Professional&OtherPlaces[]');
							for(var i=0;i<x.length;i++)
									x[i].value = "1";
							x = document.getElementsByName('Residence[]');
							for(var i=0;i<x.length;i++)
									x[i].value = "1";
							x = document.getElementsByName('Travel&Transport[]');
							for(var i=0;i<x.length;i++)
									x[i].value = "1";
						
				}
				function scatterPlot(){
				   		//alert("Yo inside scatterPlot()");
						   	var data = [];
							var divArray=[];
						   	var relArray =[];
							var modelNameArray=[];
							//var xArr=[];
							//var yArr=[];
						    for(var i=0;i<serverResult[0].Results.length;i++){
							   divArray[i]=serverResult[0].Results[i].Diversity;
							   relArray[i]=serverResult[0].Results[i].Relevnecy;
							   modelNameArray[i]=serverResult[0].Results[i].Model;
						    }
						   

						   //	var modelNameString = "<?php $modNameStr = implode(',', $model); echo $modNameStr; ?>" ;
							//var modelNameArray = modelNameString.split(",");
							
							for(var i = 0;i<serverResult[0].Results.length;i++){
								//console.log(relArray);
								var xArr = [divArray[i].toFixed(2)];
								var yArr = [relArray[i].toFixed(2)];
								//var xArr = [i];
								//var yArr = [i];
								console.log(xArr);
								var trace = {
								x: xArr,
								y: yArr,
								mode: 'markers',
								type: 'scatter',
								name: modelNameArray[i],
								text: modelNameArray[i],
								marker: { size: 12 }
								};
								data.push(trace);
							}
							var layout = { 
								xaxis: {
									title: 'Relevance',
									range: [ 0, 1.5 ] 
								},
								yaxis: {
									title: 'Diversity',
									range: [0, 1.5]
								},
								title:'Relevance(x) Vs Diversity(y) - Scatter plot'
							};
							//document.getElementById('table-scatterPlot').style.display = "none";
							Plotly.newPlot('sp', data, layout); 		   	
							//Popup.show('simplediv');
				   		
				   	}
				
				

			</script>
			
			<div id = "bottomRight" class = "slide-out-div-bottomRight" style="height:50%;">
				<a class = "handleBottomRight" href = "http://link-for-non-js-users">Content</a><br>
				<div id = "table-scatterPlot">
					<h3><font color="black">Results:</font></h3>
					<div id= "scat" style="max-height:70%;overflow:auto;margin-top:1%">
					<div id="emptySpace" height="100%">
					
					<table class = "table1" id ="scatter_tableId" style = "width : 100%">

						<tr>
						<th></th>
							<th>Algorithm</th>
							
							<!--diversity-->
							<th>Div</th>
							<!--relevance-->
							<th>Rel</th>
							<!--Radius of Gyration-->
							<th>G</th>
							<!--Run Time-->
							<th>RT</th>
						</tr>
					</table><br>
					</div>
					</div>
					

						<?php 
							$colors = array();
							array_push($colors, "#ff0000");
							array_push($colors, "#00ff00");
							array_push($colors, "#0000ff");
							array_push($colors, "#ffff00");
							array_push($colors, "#ff00ff");
							array_push($colors, "#00ffff");
							array_push($colors, "#003300");
							array_push($colors, "#663300");
							array_push($colors, "#0f0f0f");
							array_push($colors, "#003366");

							if( (!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ){
								 
								for($i=0;$i<sizeof($model);$i++){ ?>
									<tr>
										<td>
											<font color = <?php echo $colors[$modelsSelected[$i]]; ?> >
												<?php echo ($modelsSelected[$i]+1).'. '; ?>
												<?php echo $model[$i]; ?> 
											</font> 
											<input type = "checkbox" id = "<?php echo $i; ?>" checked = "true" onClick = "removeMarkers()"/>
										</td>
										<td> <?php echo round($diversity[$i], 4); ?> </td>
										<td> <?php echo round($relevancy[$i], 4); ?> </td>
										<td> <?php echo round($radiusOfGyration[$i], 4); ?></td>
										<td> <?php echo round($runTime[$i],4); ?></td>
									</tr>														
						<?php		
								}
								if (!empty($_POST['CBTwoAllVenues'])) { ?>
									<tr>
										<td> 11. <?php echo $modelAV; ?> </td>
										<td> <?php echo round($diversityAV, 4); ?> </td>
										<td> <?php echo round($relAV, 4); ?> </td>
										<td> <?php echo round($radiusOfGyrationAV, 4); ?></td>
										<td> <?php echo round($runTimeAV,4); ?></td>
									</tr>
						<?php	}
							}

						?>


					
				</div>
			
				
				<script>
					//<?php if( ((!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ) && !$errorFlag ) {?>

					//To remove the markers of a model when we are playing with them in results section
				   	function removeMarkers(){
				   		var modelString = "<?php $modStr = implode(',', $modelsSelected); echo $modStr; ?>" ;
						var modelArray = modelString.split(",");
						//delete all markers
						deleteMarkers();
						//add users location marker
						userMarker[0].setMap(map);
						//modelMarkers.length is accessible here...so delete all markers and add the required again
						for(var i=0;i<modelArray.length;i++){
							if(!document.getElementById(i).checked){
								//alert("Not checked model: "+i);
								//removeMarkersFromMap(i);
							}
							else{
								addMarkersToMap(i);
								//alert("Checked model: "+i);
							}
						}
				   	}

				   	function removeMarkersFromMap(modelIndex){
				   		var k = "<?php echo $topK[0]?>";
				   		for (var i = 0; i < markers.length; i++) {

				   			if(!(i<(modelIndex*k+k)))
							{
								modelMarkers[i].setMap(map);
						}
							//else
							//	markers[i].setMap(null);
						}
				   	}
					
					function addMarkersToMap(modelsSelected){
						//Capture the value of number of venues in k
						var k = "<?php echo $topK[0]?>";
						
						
						for (var i = 0; i < modelMarkers.length; i++) {
							if(i>=modelsSelected*k && i<(modelsSelected+1)*k){
								//alert("Inside addMarkersToMap : "+i)
								modelMarkers[i].setMap(map);
								//modelMarkers[i].addListener('click', function() {
								//alert(modelMarkers[i].getPosition());	
								//
							}						
						}
					}
					
					<!--For scatterplot-->
				   	


				   	//<?php } ?>
				   	
				
			
			var modelMarkers = [];
			var map;
			var userLocation;
			var userMarker = [];
			var myLatLng;
			var myLatLngForPath;
			var hashForMarker={};
			function initMap(){
				
				 //contains the markers
				//To adjust the map's bounds according to the locations shown
				var bounds = new google.maps.LatLngBounds();
				//To show some info when the marker is clicked
				var infowindow = new google.maps.InfoWindow();

				

				//alert("before if");
				//if(!document.getElementById('lat') || !document.getElementById('lon'))
				//If both latitude and longitude fields are empty, just give the center of both cities
				if(document.getElementById('lat').value == "" && document.getElementById('lon').value == "")
				{
					//alert("if");
					if(!document.getElementById('city').value.localeCompare("NewYork")){
						//alert("ifif");
						myLatLng = new google.maps.LatLng(40.730608477796636, -74.10964965820312) ; //New York's center
						myLatLngForPath = new google.maps.LatLng(40.730608477796636, -74.10964965820312) ;
						document.getElementById('lat').value = 40.730608477796636;			// var newYork = {lat: 40.7128,lng: -74.0059};
						document.getElementById('lon').value = -74.10964965820312;
					}
					else{
						//alert("elseif");
						myLatLng = new google.maps.LatLng(37.797666, -122.430658);	//san Francisco's center
						myLatLngForPath = new google.maps.LatLng(37.797666, -122.430658);
						document.getElementById('lat').value = 37.797666; //var sanFrancisco = {lat: 37.7749,lng: -122.4194};
						document.getElementById('lon').value = -122.430658;
					}					
				}
				else{
					//alert("else");
					var xStr = document.getElementById('lat').value;
					var yStr = document.getElementById('lon').value;
					var x = parseFloat(xStr);
					var y = parseFloat(yStr)
					if( !document.getElementById('city').value.localeCompare("NewYork") && (x<40.927018 && x > 40.496977 && y < -73.997877 && y > -74.269672)){
						//alert("elseif")
						myLatLng = new google.maps.LatLng(xStr, yStr);
						myLatLngForPath = new google.maps.LatLng(xStr, yStr);
					}
					else if(!document.getElementById('city').value.localeCompare("SanFrancisco") && (x < 37.836010 && x > 37.706632 && y < -122.356578 && y > -122.534743) ){
						//alert("elseelseif");
						myLatLng = new google.maps.LatLng(xStr, yStr);
						myLatLngForPath = new google.maps.LatLng(xStr, yStr);
					}
					else{
						//alert("if");
						if(!document.getElementById('city').value.localeCompare("NewYork")){
							//alert("elseelseif");
							myLatLng = new google.maps.LatLng(40.7128, -74.0059) ; //New York's center
							myLatLngForPath = new google.maps.LatLng(40.7128, -74.0059) ;
							document.getElementById('lat').value = 40.7128;			// var newYork = {lat: 40.7128,lng: -74.0059};
							document.getElementById('lon').value = -74.0059;
						}
						else{
							//alert("elseelseelse");
							myLatLng = new google.maps.LatLng(37.797666, -122.430658);	//san Francisco's center
							myLatLngForPath = new google.maps.LatLng(37.797666, -122.430658);
							document.getElementById('lat').value = 37.797666; //var sanFrancisco = {lat: 37.7749,lng: -122.4194};
							document.getElementById('lon').value = -122.430658;
						}	
					}
				}
				
				//creates a map with the given location as center
				map = new google.maps.Map(document.getElementById('map') , {
					zoom : 12,
					center : myLatLng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				/*
				alert("2");
				var oms = new OverlappingMarkerSpiderfier(map);  //tried for overlapping markers
				var iw = new google.maps.InfoWindow();
				oms.addListener('click', function(marker, event) {
					iw.setContent(name);
					iw.open(map, marker);
				});
				oms.addListener('spiderfy', function(markers) {
					iw.close();
				});
				*/
				map.addListener('click',function(event){
					getLocation(event);
				});

				addMarker(myLatLng);
			}
			
			var customizePath=false;
			// Adds a marker to the map and push to the array.
			function addMarker(location){
				//alert("Your location: "+location.lat()+" :: "+location.lng());
				//add the marker only of its within boundaries
				userLocation = location;
				var x = parseFloat(location.lat());
				var y = parseFloat(location.lng());
				if( (x<40.927018 && x > 40.496977 && y < -73.997877 && y > -74.269672) 
					|| (x < 37.836010 && x > 37.706632 && y < -122.356578 && y > -122.534743)){ //if location within boundaries
					//deleteMarkers();
					if(userMarker.length!=0){
						userMarker[0].setMap(null);
						userMarker = [];
					}
						
					var marker = new google.maps.Marker({
	   				position: location,
				    map: map
					});
					userMarker.push(marker);
					userMarker[0].setMap(map);
					//userMarker[0].setVisible(false);
					//markers.push(marker);
					//var myLatLng1234 = {lat: 38.797666, lng: -122.430658};
					/*var marker2 = new google.maps.Marker({
	   				position: myLatLng1234,
				    map: map
					});
					marker2.setMap(map);*/

				}
				else{
					alert("Please select a location within boundaries of "+document.getElementById('city').value);				
				}
			}
			// Deletes all markers in the array by removing references to them.
			function deleteMarkers() {
				setMapOnAll(null); //clears all markers
				modelMarkers = [];
			}
			// Sets the map on all markers in the array.
			function setMapOnAll(map) {
				//alert("in setmap on all "+modelMarkers.length);
			  for (var i = 0; i < modelMarkers.length; i++) {
				 // alert(modelMarkers[i]);
			    modelMarkers[i].setMap(map);
			  }
			}

			function getLocation(event){
				var location = event.latLng; //location of the click event
				document.getElementById("lat").value = location.lat();
				document.getElementById("lon").value = location.lng();
				addMarker(location);
				userLocation = location;

			}
			
			
			function addM(location, colorIndex, name){
				//alert("in addMap");

				//links to change the colors of the markers on the map--just create a image variable and assign this links to it. Then add icon : image in marker
				//After v1 first parameter is the label..It will be shown inside the marker--Second parameter is hexadecimal representation of color for the marker
				//See this link for more details http://googlemapsmarkers.com/
				//#ff6600","#669900"," #1a8cff","#8c1aff","#ff6666","#006666","#ffff33"
				var colors = [	"http://www.googlemapsmarkers.com/v1/1/ff6600/",
								"http://www.googlemapsmarkers.com/v1/2/669900/",
								"http://www.googlemapsmarkers.com/v1/3/1a8cff/",
								"http://www.googlemapsmarkers.com/v1/4/8c1aff/",
								"http://www.googlemapsmarkers.com/v1/5/ff6666/",
								"http://www.googlemapsmarkers.com/v1/6/006666/",
								"http://www.googlemapsmarkers.com/v1/7/ffff33/",
								
								"http://www.googlemapsmarkers.com/v1/8/663300/",
								"http://www.googlemapsmarkers.com/v1/9/0f0f0f/",
								"http://www.googlemapsmarkers.com/v1/10/003366"
				];
				//alert(location);
				var marker = new google.maps.Marker({
					//new google.maps.LatLng(-34.397, 150.644) //not changed yet
	   				position: location,
				    map: map,
				    icon : colors[colorIndex]
				});
				
				modelMarkers.push(marker);
				var infowindow = new google.maps.InfoWindow({
					content: name
				});

				marker.addListener('click', function() {
						infowindow.open(map, marker);
						
						//alert(infowindow.content);
						if(customizePath)
						showCustomTable(infowindow.content,marker.getPosition())
				});
				
				

			}
			var source = "Your Location";
			var sourceLatLang=myLatLng;
			var time;
			var walkTime;
			var firstTime=true;
			var responseArray=[];
			var responseWalkArray=[];
			var tablehd=true;
			var table;
			var tablebody;
			var flagRemovedMap=false;
			
			function getTimeAndDirection(destination,LatLang){
				directionsService.route({
						  origin: myLatLngForPath,
						  destination: LatLang,
						  travelMode: 'WALKING',
						  
						   
						}, function(response, status) {
						  if (status === 'OK'){
							  responseWalkArray.push(response);
							 // alert(response.routes[0].legs[0].duration.text+" "+myLatLngForPath+" "+LatLang);
							  walkTime= response.routes[0].legs[0].duration.text ;
							  //alert (walkTime);
						}});
				directionsService.route({
						  
						  origin: myLatLngForPath,
						  destination: LatLang,
						  travelMode: 'DRIVING',
						 
						   
						}, function(response, status) {
						  if (status === 'OK') {
							//directionsDisplay.setDirections(response);
							//json_data=response;
							//json_data=JSON.stringify(response);
							//localStorage.setItem("response",json_data);
							//showPathTable(response,names[0],names[names.length-1]);
							responseArray.push(response);
							
							time= response.routes[0].legs[0].duration.text ;
							 var myTableDiv = document.getElementById("pathTable");
							//alert(myTableDiv);
							if(tablehd){
								//alert("alert here");
								table = document.createElement('TABLE1');
								table.id="customtable";
								tableBody = document.createElement('TBODY');
								tableBody.id="customPathTable";
								//tablehd=false
								table.border = '1';
							//table.appendChild(tableBody);
							var tr = document.createElement('TR');
							//tableBody.appendChild(tr);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Source"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Destination"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Driving"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Walking"));
							tr.appendChild(th);
							tableBody.appendChild(tr);
							
							}else{
								table = document.getElementById("customtable");
								
								tableBody = document.getElementById("customPathTable");
								//tableBody.id="customPathTable";
								
							}
							
							
							
							
							var br = document.createElement('BR');
							//tr.appendChild(br);
							
							//tableBody.appendChild(tr);
							
							
							var tr = document.createElement('TR');
							//tableBody.appendChild(tr);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(source));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(destination));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(time));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(walkTime));
							tr.appendChild(td);
							tableBody.appendChild(tr);
							
							
							
							
							/*var td = document.createElement('TD');
							td.width = '95';
							td.appendChild(document.createTextNode(source));
							tableBody.appendChild(td);
							var td = document.createElement('TD');
							td.width = '95';
							td.appendChild(document.createTextNode(destination));
							tableBody.appendChild(td);
							var td = document.createElement('TD');
							td.width = '95';
							td.appendChild(document.createTextNode(time));
							tableBody.appendChild(td);
							var td = document.createElement('TD');
							td.width = '95';
							td.appendChild(document.createTextNode("0"));
							tableBody.appendChild(td);
							tableBody.appendChild(tr);*/
							table.appendChild(tableBody);
							myTableDiv.appendChild(table);
							source = destination;
							myLatLngForPath=LatLang;
							addRowHandlers(responseArray);
							if(tablehd)
							{
								
								tablehd=false;
							}
							
						  } else {
							window.alert('Directions request failed due to ' + status);
						  }
						});
						
						return "ok";
				
			}
			function addRowHandlers(responseArray) { 
						
					var rows = document.getElementById("customPathTable").rows;
					//for(var j=1;j<rows.length;j++)
						
						
					for (i = 1; i < rows.length; i++) {
						//alert("id 1 :"+i);
						rows[i].onclick = function(){ return function(){
							var index=$(this).index();
							//directionsDisplay1[0]=	new google.maps.DirectionsRenderer({map: map});   
						   //alert("id 2 :"+$(this).index());
						   
						   //alert(index);
						  // for(var j=1;j<directionsDisplay1.length;j++)
								//directionsDisplay1[0].setMap(null);
						  // alert(responseArray[i-2].routes[0].legs[0].duration.text);
						 // directionsDisplay1[0]=	new google.maps.DirectionsRenderer({map: map}); 
						// alert(directionsDisplay);
						if(flagRemovedMap)
						{
							directionsDisplay=new google.maps.DirectionsRenderer({map: map});
							flagRemovedMap=false;
						}
						
						   directionsDisplay.setDirections(responseArray[index-1]);
					};}(rows[i]);
				}
			}
			function addCellHandlers() { 
							
					var rows = document.getElementById("customPathTable1").rows;
					//alert( rows[1].cells.length);
					
					for (i = 1; i < rows.length; i++) {
						var cells = rows[i].cells;
						
						for(j=0;j<cells.length;j++){
							if((j+1)==2 ){
								//alert("click2222");
						cells[j].onclick = function(){ return function(){
							   
						   //alert("id 2 :"+$(this).index());
						   var index=$(this).index();
						  //alert("click "+cells[0].innerText);
						  openCustomizeAlgo(cells[0].innerText);
						   
					};}(cells[j]);
						}else if((j+1)==3){
							//alert("click");
							cells[j].onclick = function(){ return function(){
							   
						   //alert("id 2 :"+$(this).index());
						   var index1=$(this).index();
						  //alert("click");
						  openCustomizeAlgo2(cells[0].innerText);
						   
					};}(cells[j]);
							
						}
						else if((j+1)==4){
							//alert("click");
							cells[j].onclick = function(){ return function(){
							   
						   //alert("id 2 :"+$(this).index());
						   var index1=$(this).index();
						  if(this.innerHTML=="Yes" ){
							 this.innerHTML="No"; 
							 enableFlag=false;
							 enableArr[this.id]=0;
							// alert( enableArr[this.id]+"  at index "+this.id);
						  }else{
							  this.innerHTML="Yes"; 
							  enableFlag=true;
							  enableArr[this.id]=1;
							   //alert( enableArr[this.id]+"  at index "+this.id);
						  }
						  
						  //openCustomizeAlgo2(cells[0].innerText);
						   
					};}(cells[j]);
							
						}
						}
				}
			}	   
					
			
				function setCustomizePathTrue(){
					customizePath =true;
					//customPathModal.style.display = "block";
					alert("Click destination in your preferred order");
					for(var j=0;j<directionsDisplay123.length;j++)
						directionsDisplay123[j].setMap(null);
					document.getElementById('pathTable').innerHTML="";
					flagForPathTable=true;
					tablehd=true;
			}
			function showCustomTable(destination,LatLang){
					//alert(myLatLng);
					// get driving distance for given source and destination
					
						
					
					if(getTimeAndDirection(destination,LatLang)=="ok");
					
					{
					//var json_data=localStorage.getItem("response");
					//var response=JSON.parse(json_data);
					
					
				
				
					}
			}
			

			</script>
			<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR2GsY0vt8frdFcA_TdFbPRuQCeYQqAKM&signed_in=true&callback=initMap">
			</script>
			
			<script type = "text/javascript">
			var colorCode = ["#ff6600","#669900"," #1a8cff","#8c1aff","#ff6666","#006666","#ffff33"];
			var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
				shortestResults=[];
			var rankedResults=[];
				prefDivLambda=[];
				prefDivAlpha=[];
				prefDivSigma=[];
				pPrefDivLambda=[];
				pPrefDivAlpha=[];
				pPrefDivSigma=[];
				pageRankLambda=[];
				pageRankAlpha=[];
				pageRankSigma=[];
				disCLambda=[];
				disCAlpha=[];
				disCSigma=[];
				kmedoidLambda=[];
				kmedoidAlpha=[];
				kmedoidSigma=[];
				randomLambda=[];
				randomAlpha=[];
				randomSigma=[];
				var locations=[];
				var names=[];
				function setLocationAndNames(resultObj ,colorIndex){
					//alert("resultMarkers() called--inside");
					locations=[];
					names=[];
					var resLength;
					if(document.getElementById("noVenues").value != ""){
						resLength=document.getElementById("noVenues").value < resultObj.length ? document.getElementById("noVenues").value:resultObj.length ;
						
					}
					else resLength=resultObj.length;
					for(var i = 0;i< resLength ; i++){
						
						var latlon=resultObj[i].VenueLocation;
						var latlonArr=latlon.split(";");
						//alert("first array element lat "+latlonArr[0]);
						if(isNaN(latlonArr[0])){
							//alert("NaN found");
							break;
						}
						else{
							var myLatLngNew = {lat: parseFloat(latlonArr[0]), lng:parseFloat(latlonArr[1]) };
						
						locations.push(new google.maps.LatLng(myLatLngNew));
						names.push((resultObj[i].VenueName));
							
						}
						//var myLatLngNew = {lat: latlonArr[0], lng:latlonArr[1] };
						
						locations.push(new google.maps.LatLng(myLatLngNew));
						//alert(resultObj[i].VenueName);
						if( (resultObj[i].VenueName).includes("(")){
							break;
						}else{
							names.push((resultObj[i].VenueName));
						}
						
					}
					
	
					for(i=0;i<locations.length;i++)
					{
						addM(locations[i], colorIndex, names[i]);
						//if(i!=locations.length-1)
						
						
						
					}
					
				
					
					

					}
				//resultMarkers();

				function drawCircle(){
					var radius = document.getElementById('radius').value;
					var cityCircle = new google.maps.Circle({
						strokeColor: '#FF0000',
						strokeOpacity: 0.8,
						strokeWeight: 1,
						fillColor: '#FF0000',
						fillOpacity: 0.10,
						map: map,
						center: userLocation,
						clickable: false,
						radius: radius*1000
					});
					//alert("circle drawn");
				}
				drawCircle();
				var waypts = [];
			    var directionsService = new google.maps.DirectionsService;
					
				directionsDisplay123=[];
				directionsDisplay123Walk=[];
				directionsDisplay1=[];	
					
				function calculateAndDisplayRoute(directionsService, directionsDisplay,locations,waypts,names,a ,isOptimize) {
					directionsDisplay123[a] = new google.maps.DirectionsRenderer({map: map});
					directionsDisplay123Walk[a] = new google.maps.DirectionsRenderer({map: map});
					var waypts = [];
					var Walk;
					var json_data;
					 
					//directionsDisplay.setMap(null);
					  waypts.push({
							location: userLocation,
							stopover: false
						  });
					  for (var i = 0; i < locations.length; i++) {
						
						  waypts.push({
							location: locations[i],
							stopover: false
						  });
						}
						directionsService.route({
						  origin: locations[0],
						  destination: locations[locations.length-1],
						  travelMode: 'WALKING',
						  optimizeWaypoints:isOptimize,
						   waypoints: waypts
						}, function(response, status) {
						  if (status === 'OK') {
							  directionsDisplay123Walk[a].setOptions({
								    preserveViewport: true  ,
									suppressInfoWindows: true,
									polylineOptions: {
									  strokeColor: colorCode[a]
									}
								  });
								  walk = response.routes[0].legs[0].duration.text;
								  //alert("walk "+walk);
						  } else {
							window.alert('Directions request failed due to ' + status);
						  }
						});
					
						directionsService.route({
						  origin: locations[0],
						  destination: locations[locations.length-1],
						  travelMode: 'DRIVING',
						  optimizeWaypoints:isOptimize,
						   waypoints: waypts
						}, function(response, status) {
						  if (status === 'OK') {
							  directionsDisplay123[a].setOptions({
								    preserveViewport: true  ,
									suppressInfoWindows: true,
									polylineOptions: {
									  strokeColor: colorCode[a]
									}
								  });
								  //alert("i am here");
								  if(isOptimize){
									  rankedResults.push(response);
								  }else shortestResults.push(response);
							directionsDisplay123[a].setDirections(response);
							//json_data=response;
							json_data=JSON.stringify(response);
							localStorage.setItem("response",json_data);
							showPathTable(response,names[0],names[names.length-1],walk);
							//alert( response.routes[0].legs[0].duration.text );
						  } else {
							window.alert('Directions request failed due to ' + status);
						  }
						});
					} 
					function showPath(){
						if(document.getElementById("randomWalk").checked){
							//alert(serverResult[0]);
							clearMap();
							showRandomRoute(serverResult[0]);
						}else
						{
							clearMap();
							var obj = serverResult[0];
							for(var a=0;a<obj.Results.length;a++){
							
								if(enableArr[a]==1){
									
									setLocationAndNames(obj.Results[a].results,a);
									setMapOnAll(map);
									if(document.getElementById("similarityRank").checked)
										calculateAndDisplayRoute(directionsService, directionsDisplay,locations,waypts,names,a,false);
									else
										calculateAndDisplayRoute(directionsService, directionsDisplay,locations,waypts,names,a,true);
								}
							
							}
						
						}
						
					}
					
					var flagForPathTable=true;
					function showPathTable(response,source,destination,walk){
					
					var table;
					var tableBody;
					var myTableDiv;
					if(flagForPathTable){
						
							myTableDiv = document.getElementById("pathTable");
							
							table = document.createElement('TABLE1');
							table.id="ptTable";
							tableBody = document.createElement('TBODY');
							tableBody.id="pathTableId";
							table.border = '1';
							
							var tr = document.createElement('TR');
							
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Source"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Destination"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Driving"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Walking"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Length"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("#Venues"));
							tr.appendChild(th);
							tableBody.appendChild(tr);
							table.appendChild(tableBody);
							myTableDiv.appendChild(table);
							flagForPathTable= false;
					}
						myTableDiv = document.getElementById("pathTable");
						tableBody = document.getElementById("pathTableId");
						//alert(tableBody);
						table = document.getElementById("ptTable");
						var br = document.createElement('BR');
							//tr.appendChild(br);
							
							var tr = document.createElement('TR');
							var td = document.createElement('TD');
							td.width = '85';
							td.appendChild(document.createTextNode("Your Location"));
							tr.appendChild(td);
							//tableBody.appendChild(td);
							var td = document.createElement('TD');
							td.width = '85';
							td.appendChild(document.createTextNode(destination));
							tr.appendChild(td);
							//tableBody.appendChild(td);
							var td = document.createElement('TD');
							td.width = '85';
							td.appendChild(document.createTextNode(response.routes[0].legs[0].duration.text));
							tr.appendChild(td);
							//tableBody.appendChild(td);
							var td = document.createElement('TD');
							td.width = '85';
							td.appendChild(document.createTextNode(walk));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '85';
							td.appendChild(document.createTextNode(response.routes[0].legs[0].duration.value));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '85';
							td.appendChild(document.createTextNode(document.getElementById('numVenues').value));
							tr.appendChild(td);
							tableBody.appendChild(tr);
							table.appendChild(tableBody);
							myTableDiv.appendChild(table);
					
					
							
							
							

				}
					


					
					
				


			</script>
				
				
				
				
				
				
				
				
				
				
				<a class="btn" data-popup-open="popup-1" href="#" onClick = "scatterPlot()">
					<section class="gradient">
						<button> Scatter Plot </button>
						<button onclick = "setStats()"> Compare </button>
					</section>	
 				</a><br>
 				
 				<div class="popup" data-popup="popup-1">
				    <div class="popup-inner">
				        <div id = "sp" style= "opacity: 1; z-index:1"></div>
				        <p><a data-popup-close="popup-1" href="#">Close</a></p>
				        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
				    </div>
				</div>

 				<a class="btn" compare-popup-open="popup-2" href="#">
					<section class="gradient">
						
					</section>	
 				</a><br>
 				
 				

				<div class="popup" compare-popup="popup-2">
				    <div class="popup-inner2">
				        <div id = "stats" style= "opacity: 1; z-index:1">
				        	<table class = "table3" style = "width : 100%" border: 1>
								<tr>
									<th rowspan = "2">Algorithm</th>
									<th align = "center" colspan = "2">Diversity</th>
									<th align = "center" colspan = "2">Relevence</th>
									<th align = "center" colspan = "2">Radius of Gyration</th>
									<th align = "center" colspan = "2">Runtime</th>
								</tr>
								<tr>
									<th>Previous</th>
									<th>Present</th>
									<th>Previous</th>
									<th>Present</th>
									<th>Previous</th>
									<th>Present</th>
									<th>Previous</th>
									<th>Present</th>
								</tr>
								<?php
									$algorithms = array("PD(composite)","PD(dist+pref)","PageRank","PD(pop+dist)","PD(pref)","PD(composite+pageRank)",
										"PD(pref+dist+pr)","K-Medoids","DisC","Random Selection");

									for($i=0;$i<sizeof($algorithms);$i++){
								?>	
									<tr>
										<td><?php echo $algorithms[$i]; ?></td>
										<td id="prevDiv<?php echo $i; ?>">-</td>
										<td id="presDiv<?php echo $i; ?>">-</td>
										<td id="prevRel<?php echo $i; ?>">-</td>
										<td id="presRel<?php echo $i; ?>">-</td>
										<td id="prevGyr<?php echo $i; ?>">-</td>
										<td id="presGyr<?php echo $i; ?>">-</td>
										<td id="prevRT<?php echo $i; ?>">-</td>
										<td id="presRT<?php echo $i; ?>">-</td>
									</tr>
								<?php } ?>
							</table>
				        </div>
				        <p><a compare-popup-close="popup-2" href="#">Close</a></p>
				        <a class="popup-close" compare-popup-close="popup-2" href="#">x</a>
				    </div>
				</div>				
				

				<!--To set the values to the same value when the form is submitted previously in the session-->
 				<script type = "text/javascript">
 					<?php if( (!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ) { ?>
					function setStats(){
						//alert("setStats: "+ '<?php echo "hi"; ?>');
						
						<?php for($i=0;$i<sizeof($prevModelsSelected);$i++){
						?>
							/*
							var x = "prevDiv"+'<?php echo $prevModelsSelected[$i]; ?>';
							alert(x);
							var z = '<?php echo "$prevDiversity[$i]" ; ?>';
							alert(z);
							*/
							document.getElementById('prevDiv<?php echo $prevModelsSelected[$i]; ?>').innerHTML = '<?php echo round($prevDiversity[$i],4) ; ?>' ;
							document.getElementById('prevRel<?php echo $prevModelsSelected[$i]; ?>').innerHTML = '<?php echo round($prevRelevancy[$i],4) ; ?>' ;
							document.getElementById('prevGyr<?php echo $prevModelsSelected[$i]; ?>').innerHTML = '<?php echo round($prevRadiusOfGyration[$i],4) ; ?>' ;
							document.getElementById('prevRT<?php echo $prevModelsSelected[$i]; ?>').innerHTML = '<?php echo round($prevRunTime[$i],4) ; ?>' ;
						<?php } ?>

						<?php for($i=0;$i<sizeof($modelsSelected);$i++){
						?>
							/*
							var y = "presDiv"+'<?php echo $modelsSelected[$i]; ?>';
							alert(y);
							var u = '<?php echo "$diversity[$i]" ; ?>';
							alert(u);
							*/
							document.getElementById('presDiv<?php echo $modelsSelected[$i]; ?>').innerHTML = '<?php echo round($diversity[$i],4) ; ?>' ;
							document.getElementById('presRel<?php echo $modelsSelected[$i]; ?>').innerHTML = '<?php echo round($relevancy[$i],4) ; ?>' ;
							document.getElementById('presGyr<?php echo $modelsSelected[$i]; ?>').innerHTML = '<?php echo round($radiusOfGyration[$i],4) ; ?>' ;
							document.getElementById('presRT<?php echo $modelsSelected[$i]; ?>').innerHTML = '<?php echo round($runTime[$i],4) ; ?>' ;
						<?php } ?>
					}
					<?php } ?>
				</script>

			</div>
					
		</div>
		
		
		
		
			
		<script type = "text/javascript">
			<?php if( (!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ) { ?>
				// After submitting, this method sets values of all the fields to previously selected values
				function setValues(){
					<?php if(!empty($_POST['city'])) { ?>
						document.getElementById('city').value = "<?php echo $_POST['city'] ; ?>";
					<?php } ?>	
					<?php if(!empty($_POST['lat'])) { ?>
						document.getElementById('lat').value = "<?php echo $_POST['lat'] ; ?>";
					<?php } ?>
					<?php if(!empty($_POST['lon'])) { ?>
					//alert("latitude and longitude written");	
						document.getElementById('lon').value = "<?php echo $_POST['lon'] ; ?>";
					<?php } ?>
					<?php if(!empty($_POST['radius'])) { ?>
						document.getElementById('radius').value = "<?php echo $_POST['radius'] ; ?>";					
					<?php } ?>
					<?php if(!empty($_POST['numVenues'])) { ?>
						document.getElementById('numVenues').value = "<?php echo $_POST['numVenues'] ; ?>";	
					<?php } ?>
					
					
					<?php 
					if(!empty($_POST['CBOne'])){
				
						foreach($_POST['CBOne'] as $t) { 
					?>
							for(var i=0;i<=9;i++){
								if(document.getElementsByName('CBOne[]')[i].value == "<?php echo $t ; ?>" ){
									//alert(" "+i);							
									document.getElementsByName('CBOne[]')[i].checked = true;
								}
									
							}
					<?php 
						} 
					}	?>	
					//document.getElementsByName('CBTwo[]')[0].checked = false;
					
					
					
					<?php 
					if(!empty($_POST['CBThree'])){
				
						foreach($_POST['CBThree'] as $t) { 
					?>
							for(var i=0;i<=4;i++){
								if(document.getElementsByName('CBThree[]')[i].value == "<?php echo $t ; ?>" ){
									//alert(" "+i);							
									document.getElementsByName('CBThree[]')[i].checked = true;
								}
									
							}
					<?php 
						} 
					}	?>	
					
				}
				setValues();
			<?php } ?>
		</script>
		
				
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
				
				<div class="slide-out-div-topRight ">
					<a class="handleTopRight" href="http://link-for-non-js-users">Content</a><br>
					
					
						<form>
						<input type="radio" class="radio" name="Intensity" value="Intensity" id="intensityRank"> Highest Intensity Based
						<input type="radio" class="radio" name="Intensity" value="withoutIntensity" id="similarityRank">  Shortest Distance Based
						<input type="radio" class="radio" name="Intensity" value="randomWalk" id="randomWalk">  Random Walk
						<br/>
						<div style="margin-left : 1%;margin-top : 1%;padding:2%;">
						<label ># venues to visit:</label>
								<input class = "textbox" type = "text" id = "noVenues" name = "noVenues" size = 11  >
								</div>
						</form>
						<section class="gradient">
						<!--<label class="rb-switcher">
						<input type="checkbox" id="Intensity" class = "Boxes2" name="CBTwo[]" value="0" style="display: none;" />
						<i></i> Without Intensity
						</label>-->
						<br/>
						
						
				
								<button class="buttonsForPath" onclick = "return showPath()">Show Path</button> 
								<button class="buttonsForPath" onclick = " setCustomizePathTrue()">Customize Path</button> 
								<!--<button name="customizeBtn" onclick = "return showPathTable()">Show Table</button> -->
								 
								<input type = "text" name = "customizeText" id = "customizeText" size = "3" value = "0" style="display: none"/>
								
								
							
							
							
							
							    <!--<input type="submit" name="SubmitBottomLeft" value="Submit"/>-->
							    <button class="buttonsForPath" onClick="bottonLeftReset()">Reset</button>
						
						
						<div id="pathTable" class="new_class" style="max-height:50%; overflow:auto;" > </div>
						<br/>
						<hr/>
							
						
					
					
						
				</div>
				<div id="myModal" class="modal">

  <!-- Modal content -->
				  <div class="modal-content" style="width:40%;text-align: center;" >
				  <div class="modal-header"style="height:6%;" >
					  <span class="close">&times;</span>
					  <h3>Contributors</h3>
					</div>
					<div class="modal-body" style="text-align: center; text-size : 12px;">
					<div style="float:left;display:inline;"><h3>Front End Interface:</h3>
					<p>Ameya Daphalapurkar</p>
					<p>Darpun Kohli</p>
					<p>Manali Shimpi</p>
					<p>Samanvoy Panati</p>
					</div>
					<div style="float:right;display:inline;"><h3>Back End Server:</h3>
					<p>Xiaoyu Ge</p> 
					</div>
					
					
					 
					
					<div style="float:left; text-align:center;display:inline; margin-left:6%;">
					 <h3>Supervised By : </h3> 
					 <p>Panos K. Chrysanthis</p> 
					 <p>Konstantinos Pelechrinis</p>
					 <p>Demetrios Zeinalipour - Yazti (MPII)</p>
					 <p>Mohamed A. Sharaf (UQ)</p>
					 </div>
					  
					  
					 
					  
					  
					</div>
					 <div class="modal-footer" ><img src="images/footerLogos.png"style="width:95%; height:6%;" /></div>
					
					
				 

				</div></div>
				
				<div id="addAlgoModal" class="modal">

					<!-- Modal content -->
				  <div class="modal-content"style="width:40%;background-color: #e8e8e8;" >
				  <div class="modal-header" >
					  <span class="closeAlgo">&times;</span>
					  <h2>Algorithm Description</h2>
					</div>
					<div class="modal-body">
					<br/>
					<div class="input-chunk">
						Input File : 
						<label class="chooseFile">
						<input type="file"  />
						<span >Choose File</span>
						 </label>
						<br>
						<a id="start-upload" href="javascript:void(0);" onclick="uploadFile();">Upload</a>
						</div>
					
					<br/>
					  
					  <!--button id="addAlgoSubmit" class="addAlgoSubmit" onclick = "" >Submit</button>-->
					
					  <section class="gradient">
					  <input type="Button" id="addAlgoSubmit" name="Submit"  value ="Submit" onclick='afterUpload()' />
					  </section>
					  
					</div>
					
					
				 

				</div></div>
				
				<div id="customAlgoModal" class="modal">

					<!-- Modal content -->
				  <div class="modal-content"style="width:40%;background-color: #e8e8e8;" >
				  <div class="modal-header" >
					  <span class="closeCustomAlgo">&times;</span>
					  <h2>Select intensity values  </h2>
					</div>
					<div class="modal-body">
				
					<br/>
					<BR/>I = 
					<input type = "text" class = "rangeText" id = "txtLambda"  value = "" placeholder="0.2" onkeyup="showSigma(this.value,'lambda')" /> * [ (
					
					<input type = "text" class = "rangeText" id = "txtSigma"  value = "" placeholder="0.5" onkeyup="showSigma(this.value,'sigma')" /> * Popularity ) + ( 1 - <span id="sigma">0.5<script>$("#txtSigma").val()</script></span>) * Distance ] +
					(1 - <span id="lambda">0.2<script>$("#txtLambda").val()</script></span>) * Preference 
					<br/>
					<br/>
					
					<!--img src="images/beta.png" height="3%" width="4%" style="margin-left:2%"/>
					<input type = "text" class = "rangeText" id = "rangeText"  value = "" />
					<img src="images/gamma.png" height="5%" width="5%" style="margin-left:2%"/>
					<input type = "text" class = "rangeText" id = "rangeText"  value = "" /-->

					  
					  <section class="gradient">
							
						    <input type="Button" id="x" name="Submit"  value ="Submit" onclick='addLambdSigma($("#txtLambda").val(),$("#txtSigma").val())' />
					
						</section>
					</div>
					
					
				 

				</div></div>
				<div id="customAlgoModal2" class="modal">

					<!-- Modal content -->
				  <div class="modal-content"style="width:40%;background-color: #e8e8e8;" >
				  <div class="modal-header" >
					  <span class="closeCustomAlgox">&times;</span>
					  <h2>Select Similarity Values  </h2>
					</div>
					<div class="modal-body">
				
					<br/>
					<BR/>
					D = <input type = "text" class = "rangeText" id = "txtAlpha"  value = "" placeholder="0.2" onkeyup="showSigma(this.value,'alpha')" /> * [ ( T +
					
					
					(1 - <span id="alpha">0.2<script>$("#txtAlpha").val()</script></span>) ] * Word2Vec
					<br/>
					<br/>
					
					<!--img src="images/beta.png" height="3%" width="4%" style="margin-left:2%"/>
					<input type = "text" class = "rangeText" id = "rangeText"  value = "" />
					<img src="images/gamma.png" height="5%" width="5%" style="margin-left:2%"/>
					<input type = "text" class = "rangeText" id = "rangeText"  value = "" /-->

					  
					  <section class="gradient">
							
						    <input type="Button" id="x" name="Submit"  value ="Submit" onclick='addAlpha($("#txtAlpha").val())' />
					
						</section>
					</div>
					
					
				 

				</div></div>
				
				
				
				
				<script>
				function afterUpload(){
					var name = document.querySelector('input[type=file]').files[0].name;
					name = name.substring(0,name.length - 6);
					addAlgo(name);
					
				}
				function uploadFile(){
					
						
							
					if(document.getElementById("upload-file") != null && uploadOnChange()){
						
							var fileObj = document.getElementById("upload-file").files[0]; 
							var FileController = "http://71.199.97.2:9999/UploadServlet";
							 var form = new FormData();	
							 form.append("file", fileObj);
					
							 var xhr = new XMLHttpRequest();	
							 xhr.open("post", FileController, true);	
							 xhr.onload = function () {	
								 alert("File has been uploaded!");	
							 };	
							 xhr.send(form);
								
					}else{
						alert("No file chosen!");
					}
					
					
				}
				function addAlpha(alpha){
					
					if(alpha=="")
						alpha=0.2;
					//alert(alpha);
					customAlgoModal2.style.display = "none";
					//alert("inside alpha "+prefDivFlag2)
					if(prefDivFlag2){
						//alert("adding "+lambda+" "+sigma);
						prefDivAlpha.push(alpha);
						
						prefDivFlag2=false;
					}
					if(pPrefDivFlag2){
						//alert("adding "+lambda+" "+sigma);
						pPrefDivAlpha.push(alpha);
						
						pPrefDivFlag2=false;
					}
					if(pageRankFlag2){
						//alert("adding "+lambda+" "+sigma);
						pageRankAlpha.push(alpha);
						
						pageRankFlag2=false;
					}
					if(disCFlag2){
						//alert("adding "+lambda+" "+sigma);
						disCAlpha.push(alpha);
						
						disCFlag2=false;
					}
					if(kmedoidFlag2){
						//alert("adding "+lambda+" "+sigma);
						kmedoidAlpha.push(alpha);
						
						kmedoidFlag2=false;
					}
					if(randomFlag2){
						//alert("adding "+lambda+" "+sigma);
						randomAlpha.push(alpha);
						
						randomFlag2=false;
					}
					
				}
				
				function addLambdSigma(lambda,sigma){
					if(lambda=="")
						lambda=0.2;
					if(sigma=="")
						sigma=0.5;
					customAlgoModal.style.display = "none";
					//alert("inside lambda sigma "+prefDivFlag)
					if(prefDivFlag){
						//alert("adding "+lambda+" "+sigma);
						prefDivLambda.push(lambda);
						prefDivSigma.push(sigma);
						prefDivFlag=false;
						
					}
					if(pPrefDivFlag){
						pPrefDivLambda.push(lambda);
						pPrefDivSigma.push(sigma);
						pPrefDivFlag=false;
					}
					if(pageRankFlag){
						pageRankLambda.push(lambda);
						pageRankSigma.push(sigma);
						pageRankFlag=false;
					}
					if(disCFlag){
						disCLambda.push(lambda);
						disCSigma.push(sigma);
						disCFlag=false;
					}
					if(kmedoidFlag){
						kmedoidLambda.push(lambda);
						kmedoidSigma.push(sigma);
						kmedoidFlag=false;
					}
					if(randomFlag){
						randomLambda.push(lambda);
						randomSigma.push(sigma);
						randomFlag=false;
					}
					
				}
				function showSigma(val,spanId){
					document.getElementById(spanId).innerHTML = val;
				}
				function myFunction(myValue,nameOfId){
					//alert("called");
					document.getElementById(nameOfId).innerHTML = myValue;
				}
				function uploadOnChange(){
						
						var name = document.querySelector('input[type=file]').files[0].name;
						var ext = name.substring(name.length - 5 , name.length);
						console.log("ext is "+ext);
						if (ext != "class"){
							alert("Please upload .class file");
							return false;
						}
					return true;
				}
				
				var algoIndex=12;
				var algoFlag=true;
				function addAlgo(name){
					var mainContainer = document.getElementById("newAlgoContainer");
					var selectMenu = document.createElement("div");
					selectMenu.className  = "customAlgo_";
					selectMenu.id = "customAlgo_"+name;
					selectMenu.style.display="block";
					
					var opt = document.createElement('label');
					opt.value = name;
					opt.innerHTML = name;
					opt.onclick = function() { addRowForAlgo(name); };
					selectMenu.appendChild(opt);
					mainContainer.appendChild(selectMenu);
					mainContainer.appendChild(document.createElement("hr"));
					var forClosingModal=document.getElementById('addAlgoModal');
					forClosingModal.style.display = "none";
				}
				var span = document.getElementsByClassName("close")[0];
				var spanAlgo = document.getElementsByClassName("closeAlgo")[0];
				var spanCustomAlgo = document.getElementsByClassName("closeCustomAlgo")[0];	
				var spanCustomAlgo2 = document.getElementsByClassName("closeCustomAlgox")[0];
				
				var modal = document.getElementById('myModal');

							// Get the button that opens the modal
							var btn = document.getElementById("contributors");

							// Get the <span> element that closes the modal
							var addAlgoBtn = document.getElementById("AddAlgo");
							var addAlgoModal = document.getElementById('addAlgoModal');
							// When the user clicks on the button, open the modal 
						 function showModal()  {
								modal.style.display = "block";
							}
							function addAlgoShowModal()  {
								addAlgoModal.style.display = "block";
							}

							// When the user clicks on <span> (x), close the modal
							span.onclick = function() {
								modal.style.display = "none";
								
							}
							spanAlgo.onclick = function() {
								
								addAlgoModal.style.display = "none";
							}
							spanCustomAlgo.onclick = function() {
								//alert("inclose");
								customAlgoModal.style.display = "none";
							}
							spanCustomAlgo2.onclick = function() {
								//alert("inclose");
								customAlgoModal2.style.display = "none";
							}

							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
								if (event.target == modal) {
									modal.style.display = "none";
								}
							}
							window.onclick = function(event) {
								if (event.target == addAlgoModal) {
									addAlgoModal.style.display = "none";
								}
							}
					var prefDivNum=0;
					var pPrefDivNum=0;
					var pageRankNum=0;
					var disCNum=0;
					var kmedoidNum=0;
					var randomNum=0;
					var enableCounter=0;
					function addRowForAlgo(name){
						//alert("enableCounter "+enableCounter+"enable arr "+enableArr[enableCounter]);
						enableArr[enableCounter]=1;
						//alert("enableCounter "+enableCounter+"enable arr "+enableArr[enableCounter]);	
						switch(name) {
							
							case "PrefDiv":
								models[0]=1;
								prefDivNum = prefDivNum+1;
								//alert(prefDivNum);
								//document.getElementById('algo0').value=prefDivNum;
								
								break;
							case "pPrefDiv":
							models[1]=1;
								pPrefDivNum = pPrefDivNum+1;
								//alert(pPrefDivNum);
								break;
								
								
							case "PageRank":
								models[2]=1;
								pageRankNum = pageRankNum+1;
								
								break;
							case "DisC":
								models[4]=1;
								disCNum = disCNum+1;
								break;
							case "K-Medoids":
								models[3]=1;
								kmedoidNum = kmedoidNum+1;
								break;
							case "Random":
								models[5]=1;
								randomNum = randomNum+1;
								break;
							default : custonModels="on";
							customModelsNames.push(name);
							break;
								
							
						}
						//alert("in");
						customAlgoModal.style.display = "none";
						customAlgoModal2.style.display = "none";
						 var myTableDiv = document.getElementById("emptySpace");
							//alert(myTableDiv);
							if(algoFlag){
								table = document.createElement('TABLE1');
								table.id="customtable1";
								tableBody = document.createElement('TBODY');
								tableBody.id="customPathTable1";
								//tablehd=false
								table.border = '1';
							//table.appendChild(tableBody);
							var tr = document.createElement('TR');
							//tableBody.appendChild(tr);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Algorithm"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Rank"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Diversity"));
							tr.appendChild(th);
							var th = document.createElement('TH');
							th.width = '105';
							th.appendChild(document.createTextNode("Enabled"));
							tr.appendChild(th);
							
							
							tableBody.appendChild(tr);
							algoFlag=false;
							}else{
								table = document.getElementById("customtable1");
								
								tableBody = document.getElementById("customPathTable1");
								//tableBody.id="customPathTable";
								
							}
							
							
							
							
							var br = document.createElement('BR');
							//tr.appendChild(br);
							
							//tableBody.appendChild(tr);
							
							
							var tr = document.createElement('TR');
							tr.id=enableCounter;
							//tableBody.appendChild(tr);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(name));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.id="xxx";
							td.width = '105';
							td.appendChild(document.createTextNode('I'));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode('S'));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.id=enableCounter;
							td.width = '105';
							td.appendChild(document.createTextNode('Yes'));
							tr.appendChild(td);
							
							tableBody.appendChild(tr);
							
							
							table.appendChild(tableBody);
							myTableDiv.appendChild(table);
							addCellHandlers();
							enableCounter=enableCounter+1;
							//alert("enableCounter "+enableCounter);

					}
					function showloader(){
						document.getElementById("loader").style.display = 'block';
						var str="";
						var input="";
						var modelString="";
						var pfa,pfl,pfs;
						var ppfa,ppfl,ppfs;
						var kma,kml,kms;
						var pra,prl,prs;
						var da,dl,ds;
						var ra,rl,rs;
						var StringToSend="";
						for(var k=0;k<6;k++){
							
							if(models[k]==1)
								modelString+=k+",";
						}
						
						if(group.substring(group.length-1)==',')
							group=group.substring(0,group.length-1);
						
						modelString=modelString.substring(0,modelString.length-1);
						if(document.getElementById('numVenues').value==null || document.getElementById('radius').value== null || group=="" || modelString=="" || profile=="" ){
							alert("Dont leave any empty fields please!!");
						}
						//var input = {'topK':document.getElementById('numVenues').value,'radius':document.getElementById('radius').value,'groupIds':group,'profile':profile,'Models':modelString}; //'prefDivAlpha' :prefDivAlpha, 'prefDivLambda': prefDivLambda,'prefDivSigma':prefDivSigma};
						input = '\\"topK\\":\\"'+document.getElementById('numVenues').value+'\\",\\"radius\\":\\"'+document.getElementById('radius').value+'\\",\\"groupIds\\":\\"'+group+'\\",\\"profile\\":\\"'+profile+'\\",\\"Models\\":\\"'+modelString+'\\",';
						
						
						if(prefDivNum > 0){
							str+='\\"prefDivNum\\":\\"'+prefDivNum+'\\",';
							for(var j=0;j<prefDivNum;j++){
								if(prefDivAlpha[j] == null){
									pfa=0.2;
								}else{pfa= kmedoidAlpha[j];}
								if(prefDivLambda[j] == null){
									pfl=0.5;
								}else{pfl= prefDivLambda[j];}
								if(prefDivSigma[j] == null){
									pfs=0.2;
								}else{pfs= prefDivSigma[j];}
							str +='\\"prefDivAlpha'+j+'\\":\\"'+pfa+'\\",';
							str +='\\"prefDivLambda'+j+'\\":\\"'+pfl+'\\",';
							str +='\\"prefDivSigma'+j+'\\":\\"'+pfs+'\\",';
							str +='\\"prefDivDelta'+j+'\\":\\"'+0.5+'\\",';
							}
						}
						if(pPrefDivNum > 0){
							str+='\\"pPrefDivNum\\":\\"'+pPrefDivNum+'\\",';
							for(var j=0;j<pPrefDivNum;j++){
								if(pPrefDivAlpha[j] == null){
									ppfa=0.2;
								}else{ppfa= pPrefDivAlpha[j];}
								if(pPrefDivLambda[j] == null){
									ppfl=0.5;
								}else{ppfl= pPrefDivLambda[j];}
								if(pPrefDivSigma[j] == null){
									ppfs=0.2;
								}else{ppfs= pPrefDivSigma[j];}
							str +='\\"pPrefDivAlpha'+j+'\\":\\"'+ppfa+'\\",';
							str +='\\"pPrefDivLambda'+j+'\\":\\"'+ppfl+'\\",';
							str +='\\"pPrefDivSigma'+j+'\\":\\"'+ppfs+'\\",';
							str +='\\"pPrefDivDelta'+j+'\\":\\"'+0.5+'\\",';
							}
						}
						if(pageRankNum > 0){
							str+='\\"PageRankNum\\":\\"'+pageRankNum+'\\",';
							for(var j=0;j<pageRankNum;j++){
								if(pageRankAlpha[j] == null){
									pra=0.2;
								}else{pra= pageRankAlpha[j];}
								if(pageRankLambda[j] == null){
									prl=0.5;
								}else{prl= pageRankLambda[j];}
								if(pageRankSigma[j] == null){
									prs=0.2;
								}else{prs= pageRankSigma[j];}
							str +='\\"PageRankAlpha'+j+'\\":\\"'+pra+'\\",';
							str +='\\"PageRankLambda'+j+'\\":\\"'+prl+'\\",';
							str +='\\"PageRankSigma'+j+'\\":\\"'+prs+'\\",';
							str +='\\"PageRankDelta'+j+'\\":\\"'+0.5+'\\",';
							}
						}
						if(disCNum > 0){
							str+='\\"DisCNum\\":\\"'+disCNum+'\\",';
							for(var j=0;j<disCNum;j++){
								if(disCAlpha[j] == null){
									da=0.2;
								}else{da= disCAlpha[j];}
								if(disCLambda[j] == null){
									dl=0.5;
								}else{dl= disCLambda[j];}
								if(disCSigma[j] == null){
									ds=0.2;
								}else{ds= disCSigma[j];}
							str +='\\"DisCAlpha'+j+'\\":\\"'+da+'\\",';
							str +='\\"DisCLambda'+j+'\\":\\"'+dl+'\\",';
							str +='\\"DisCSigma'+j+'\\":\\"'+ds+'\\",';
							str +='\\"DisCDelta'+j+'\\":\\"'+0.5+'\\",';
							}
						}
						if(kmedoidNum > 0){
							str+='\\"KMedoidsNum\\":\\"'+kmedoidNum+'\\",';
							for(var j=0;j<kmedoidNum;j++){
								if(kmedoidAlpha[j] == null){
									kma=0.2;
								}else{kma= kmedoidAlpha[j];}
								if(kmedoidLambda[j] == null){
									kml=0.5;
								}else{kml= kmedoidLambda[j];}
								if(kmedoidSigma[j] == null){
									kms=0.2;
								}else{kms= kmedoidSigma[j];}
							str +='\\"KMedoidsAlpha'+j+'\\":\\"'+kma+'\\",';
							str +='\\"KMedoidsLambda'+j+'\\":\\"'+kml+'\\",';
							str +='\\"KMedoidsSigma'+j+'\\":\\"'+kms+'\\",';
							str +='\\"KMedoidsDelta'+j+'\\":\\"'+0.5+'\\",';
							}
						}
						if(randomNum > 0){
							str+='\\"RandomNum\\":\\"'+randomNum+'\\",';
							for(var j=0;j<randomNum;j++){
								if(randomAlpha[j] == null){
									ra=0.2;
								}else{ra= randomAlpha[j];}
								if(randomLambda[j] == null){
									rl=0.5;
								}else{rl= randomLambda[j];}
								if(randomSigma[j] == null){
									rs=0.2;
								}else{rs= randomSigma[j];}
							str +='\\"RandomAlpha'+j+'\\":\\"'+ra+'\\",';
							str +='\\"RandomLambda'+j+'\\":\\"'+rl+'\\",';
							str +='\\"RandomSigma'+j+'\\":\\"'+rs+'\\",';
							str +='\\"RandomDelta'+j+'\\":\\"'+0.5+'\\",';
							}
						}
						
						if(custonModels=="on"){
							var custString='\\"customModelsNames\\":\\"'+customModelsNames+'\\",';
							StringToSend=custString;
						}
						//alert(str);
						console.log("------------------------");
						//console.log(JSON.stringify(input));
						//var inputString=inputString.substring(1,inputString.length-1);
						//alert(inputString);
						str=str.substring(0,str.length-1);
						StringToSend+='{\\"UserLocation\\":\\"'+userLocation.lat()+';'+userLocation.lng()+'\\",'+input +'\\"prefDivRouteLength\\":\\"4\\",\\"pPrefDivRouteLength\\":\\"4\\",\\"PageRankRouteLength\\":\\"4\\",\\"DisCRouteLength\\":\\"4\\",\\"KMedoidsRouteLength\\":\\"4\\",\\"RandomRouteLength\\":\\"4\\",\\"custonModels\\":\\"'+custonModels+'\\",'+str+'}';
				console.log("StringTo Send "+StringToSend);
				//console.log("------------------------");
				//window.location = 'http://localhost/ep_latest/final8.php?' + 'algo123='+prefDivNum;
					 var workingString = '{\\"topK\\":\\"8\\",\\"prefDivAlpha0\\":\\"0.5\\",\\"profile\\":\\"FoodLover\\",\\"prefDivRouteLength\\":\\"4\\",\\"AllVenue\\":\\"TRUE\\",\\"prefDivNum\\":\\"1\\",\\"UserLocation\\":\\"37.797666;-122.430658\\",\\"groupIds\\":\\"1,2,3,4,5,6,7,8,9,10\\",\\"prefDivSigma0\\":\\"0.4\\",\\"prefDivDelta0\\":\\"0.2\\",\\"prefDivLambda0\\":\\"0.6\\",\\"Models\\":\\"0\\",\\"radius\\":\\"20\\",//"custonModels//"://"0//"}';
					
					 $.ajax(
						{
							url: 'handler.php',
							dataType: 'text',
							type: 'post',
							data: {test : StringToSend},
							success: function(data)
							{ 
								document.getElementById("loader").style.display = 'none';
								var x=data;
								//alert(data);
								var x2=x.substring(19,data.length-2);
								//window.alert(x.substring(19,data.length-2));
								console.log(data);
								var obj = JSON.parse(x2);
								//alert(obj.Results[0].randomRoute+" "+obj.Results[0].results);
								/*for(var a=0;a<obj.Results.length;a++){
									setLocationAndNames(obj.Results[a].results);
									setMapOnAll(map);
									serverResult.push(obj.Results[a].results);
								}
								*/
								//alert(obj.length);
								fillScatterTable(obj);
								serverResult[0]=obj;
								displayResults(obj);
								//showRandomRoute(obj);
							}
						})
					
					//topRightReset(0);
				}
				function clearMap(){
					deleteMarkers();
					directionsDisplay.setMap(null);
					flagRemovedMap=true;
					responseArray=[];
					for(var j=0;j<directionsDisplay123.length;j++)
						directionsDisplay123[j].setMap(null);
					//directionsDisplay.setMap(null);
					document.getElementById('pathTable').innerHTML="";
					flagForPathTable=true;
					tablehd=true;
					
				}
				function showRandomRoute(obj){
					//deleteMarkers();
					//for(var j=0;j<directionsDisplay123.length;j++)
						//directionsDisplay123[j].setMap(null);
					//document.getElementById('pathTable').innerHTML="";
					//flagForPathTable=true;
					if(obj.Results[0].hasOwnProperty('randomRoute')){
						//alert ('it has');
						setLocationAndNames(obj.Results[0].randomRoute,0);
							setMapOnAll(map);
							calculateAndDisplayRoute(directionsService, directionsDisplay,locations,waypts,names,0,false);
					}else 
						alert ("We do not have a random route for this algorithm");
					
				}
				
				function displayResults(obj){
					deleteMarkers();
					//console.log("Inside displayResults");
					for(var j=0;j<directionsDisplay123.length;j++)
						directionsDisplay123[j].setMap(null);
					document.getElementById('pathTable').innerHTML="";
					flagForPathTable=true;
					tablehd=true;
					for(var a=0;a<obj.Results.length;a++){
						//console.log("in for of a "+enableArr[a]);
						if(enableArr[a]==1){
							//console.log("adding markers");
							setLocationAndNames(obj.Results[a].results,a);
							setMapOnAll(map);
							
						}
						
					}
					
				}
				function fillScatterTable(obj){
				var tableForScatter = document.getElementById("scatter_tableId");
				for(var i=0;i<obj.Results.length;i++){
					//alert(obj.Results[i].Diversity);
					var dive = obj.Results[i].Diversity;
					var rel = obj.Results[i].Relevnecy;
					var rg = obj.Results[i].radiusOfGyration;
					
					var rt = obj.Results[i].runtime;
					var tr = document.createElement('TR');
							//tr.id=enableCounter;
							//tableBody.appendChild(tr);
							var td = document.createElement('TD');
							td.width = '105';
							var checkbox = document.createElement("INPUT");
							checkbox.type = "checkbox";
							checkbox.checked = true;
							checkbox.id="chkID"+i;
							td.appendChild(checkbox);
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(obj.Results[i].Model));
							tr.appendChild(td);
							
							var td = document.createElement('TD');
							td.id="scattertd";
							td.width = '105';
							td.appendChild(document.createTextNode(dive.toFixed(4)));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.width = '105';
							td.appendChild(document.createTextNode(rel.toFixed(4)));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.id=enableCounter;
							td.width = '105';
							td.appendChild(document.createTextNode(rg.toFixed(5)));
							tr.appendChild(td);
							var td = document.createElement('TD');
							td.id=enableCounter;
							td.width = '105';
							td.appendChild(document.createTextNode(rt.toFixed(4)));
							tr.appendChild(td);
							
							tableForScatter.appendChild(tr);
							rowHandlersForScatter();
				}
				
				
				
			}
			function rowHandlersForScatter() { 
						
					var rows = document.getElementById("scatter_tableId").rows;
					//for(var j=1;j<rows.length;j++)
						
						
					for (i = 1; i < rows.length; i++) {
						//alert("id 1 :"+i);
						rows[i].onclick = function(){ return function(){
							var index=$(this).index()-1;
							
							document.getElementById("chkID"+index).checked=document.getElementById("chkID"+index).checked==true? false:true;
							toggleResult(index);
					};}(rows[i]);
				}
			}
			function toggleResult(index){
				var k=document.getElementById('numVenues').value;
				var t;
				if(!document.getElementById("chkID"+index).checked){
					if(document.getElementById("similarityRank").checked || document.getElementById("intensityRank").checked){
						directionsDisplay123[index].setMap(null);
						
						
						for(i=0;i<modelMarkers.length;i++)
						{
							t=modelMarkers[i].icon.substring(36,37);
						
							if(t==index+1)
								modelMarkers[i].setVisible(false);
						}
						
					}
					
				}else {
					
					directionsDisplay123[index] = new google.maps.DirectionsRenderer({map: map});
					console.log("index is "+index);
					directionsDisplay123[index].setOptions({
								    preserveViewport: true  ,
									suppressInfoWindows: true,
									polylineOptions: {
									  strokeColor: colorCode[index]
									}
								  });
					if(document.getElementById("similarityRank").checked && document.getElementById("chkID"+index).checked){
						
						directionsDisplay123[index].setDirections(shortestResults[index]);
					}else if(document.getElementById("intensityRank").checked && document.getElementById("chkID"+index).checked){
						directionsDisplay123[index].setDirections(rankedResults[index]);
					}
					for(i=0;i<modelMarkers.length;i++)
						{
							t=modelMarkers[i].icon.substring(36,37);
							//console.log("t "+t+" index "+index);
							//console.log(modelMarkers[0].icon);
							if(t==index+1)
								modelMarkers[i].setVisible(true);
						}
					
				}
				
			}
			
				
				
				
				
					
				</script>
			
		
	</body>
</html>