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
		if(empty($_POST['lat']) || empty($_POST['lon']) || empty($_POST['radius']) || empty($_POST['numVenues'])){
			$errorFlag = true;
		}
		else{
			array_push($argu, $_POST['lat']);
			array_push($argu, $_POST['lon']);
			array_push($argu, $_POST['radius']);
			array_push($argu, $_POST['numVenues']);

			array_push($argu, ";");			
		}
		
		
		if(empty($_POST['CBOne']) && empty($_POST['CBThree'])){
			$errorFlag = true;
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

		
		if(empty($_POST['CBTwo'])){
			$errorFlag = true;
		}
		else{
			foreach($_POST['CBTwo'] as $t){
				array_push($argu, $t);
				array_push($modelsSelected, $t);
			}			
		}


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
				//echo $para;
				//echo "HELLO";
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
		<link href="css/stylesScratch.css" rel="stylesheet" type="text/css" media="all" />
		<!--Popup's css-->
		<link href="css/popup.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="css/rb-switcher.min.css"/>
		<!--Google fonts-->
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
					pathToTabImage: 'images/1.jpg',          //path to the image for the tab (optionaly can be set using css)
					imageHeight: '142px',                               //height of tab image
					imageWidth: '44px',                               //width of tab image    
					tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
					speed: 300,                                        //speed of animation
					action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
					topPos: '110px',                                   //position from the top
					fixedPosition: false,                           //options: true makes it stick(fixed position) on scroll
					handleTop: 0
				});

				$('.slide-out-div-bottomLeft').tabSlideOut({
					tabHandle: '.handleBottomLeft',                             
					pathToTabImage: 'images/2.jpg',          
					imageHeight: '143px',                           
					imageWidth: '44px',                           
					tabLocation: 'left',                    
					speed: 300,                                      
					action: 'click',                            
					topPos: '180px',                               
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 100                   
				});
				$('.slide-out-div-bottom').tabSlideOut({
					tabHandle: '.handleBottom',                             
					pathToTabImage: 'images/2.jpg',          
					imageHeight: '143px',                           
					imageWidth: '44px',                           
					tabLocation: 'left',                    
					speed: 300,                                      
					action: 'click',                            
					topPos: '180px',                               
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 300                  
				});
				$('.slide-out-div-topRight').tabSlideOut({
					tabHandle: '.handleTopRight',                             
					pathToTabImage: 'images/3.jpg',          
					imageHeight: '178px',                               
					imageWidth: '47px',                               
					tabLocation: 'right',                               
					speed: 300,                                    
					action: 'click', 
					topPos: '74px',  
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 0
				});

				$('.slide-out-div-bottomRight').tabSlideOut({
					tabHandle: '.handleBottomRight',
					pathToTabImage: 'images/4.jpg',
					imageHeight: '140px',
					imageWidth: '44px',
					tabLocation: 'right',
					speed: 300,
					action: 'click',
					topPos: '130px',
					//leftPos: '100px',
					fixedPosition: false,
					handleTop: 150,
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
			
			//alert("level length : "+level2.length+" Keys length: "+keys.length);


		</script>
		
		

	</head>

	<body>
		<div id = "screen">
				<!--header-->
			<header>
			<a class = "header" target="_blank" href="images/head5.jpg" onclick = "event.preventDefault()">
				<img src="images/head5.jpg" height = "70px" width="100%">
			</a>
			</header>
			<!--<div id="loader"><img src="images/loading.gif"></div>-->
			<div>
				<div id = "map">
				</div> 
				<!--<div id="loadingImg" style="display:none;height:10%;width:10%;align:center">
	    				<img src="images/loading.gif">
				</div>-->
			</div>

			<footer>
			<a class = "footer" target="_blank" href="images/foot1.jpg" onclick = "event.preventDefault()">
					<img src="images/foot1.jpg" width="100%">
			</a>
			</footer>	
			<form id = "ALL" name = "ALL" action = "" method = "POST">
				<div class="slide-out-div-topLeft">
					<a class="handleTopLeft" href="http://link-for-non-js-users">Content</a>

					<!--<form id = "topLeft" name = "topLeft">-->
						<label class = "small">City:</label>
						<select class = textbox id = "city" name="city" onChange = "initMap()">
							<option value="SanFrancisco">San Francisco</option>
		    				<option value="NewYork">New York</option>
		    				<!--<option value="NewDelhi">New Delhi</option>-->
		  				</select><br><br>
						<label class = "small">Position:</label>
						<input class = "textbox" id = "lat" type = "text" name = "lat" size = 5>
						<input class = "textbox" id = "lon" type = "text" name = "lon" size = 5>
						<br><br>
						<label class = "small">Radius:</label>
						<input class = "textbox" type = "text" id = "radius" name = "radius" size = 11 value = "" placeholder="Square kms">
						<br><br>
						<label class = "small"># Venues:</label>
						<input class = "textbox" type = "text" id = "numVenues" name = "numVenues" size = 11>
						<br><br>

						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Arts" name="CBOne[]" value="1" />
							<i></i>
						</label> Arts & Entertainment<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="College" name="CBOne[]" value="2" />
							<i></i>
						</label> College & University<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Event" name="CBOne[]" value="3" />
							<i></i>
						</label> Event<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Food" name="CBOne[]" value="4" />
							<i></i>
						</label> Food<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Nightlife" name="CBOne[]" value="5" />
							<i></i>
						</label> Nightlife Spot<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Outdoors" name="CBOne[]" value="6" />
							<i></i>
						</label> Outdoors & Recreation<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Professional" name="CBOne[]" value="7" />
							<i></i>
						</label> Professional & Other Places<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Residence" name="CBOne[]" value="8" />
							<i></i>
						</label> Residence<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Shop" name="CBOne[]" value="9" />
							<i></i>
						</label> Shop & Service<hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes1" id="Travel" name="CBOne[]" value="10" />
							<i></i>
						</label> Travel & Transport
						
						<br><br>
						<section class="gradient">
						    <!--<input type="submit" name="SubmitTopLeft" value="Submit"/>-->
						    <input type="reset" name="CancelTopLeft" value="Reset"/>
						</section>	
				</div>
				
				<div class="slide-out-div-topRight">
					<a class="handleTopRight" href="http://link-for-non-js-users">Content</a><br>
					
						<h3><font color="#f4c20f">Select required algorithms:</font></h3>
						<label class="rb-switcher model0">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="0"/>
							<i></i>
						</label>1. PD(composite)<hr>
						<label class="rb-switcher model1">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="1" />
							<i></i>
						</label>2. PD(dist+pref)<hr>
						<label class="rb-switcher model2">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="2" />
							<i></i>
						</label>3. PageRank<hr>
						<label class="rb-switcher model3">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="3" />
							<i></i>
						</label>4. PD(pop+dist)<hr>
						<label class="rb-switcher model4">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="4" />
							<i></i>
						</label>5. PD(pref) <hr>
						<label class="rb-switcher model5">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="5" />
							<i></i>
						</label>6. PD(composite+PageRank)<hr>
						<label class="rb-switcher model6">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="6" />
							<i></i>
						</label>7. PD(pref+dist+pr)<hr>
						<label class="rb-switcher model7">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="7" />
							<i></i>
						</label>8. K-Medoids<hr>
						<label class="rb-switcher model8">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="8" />
							<i></i>
						</label>9. DisC<hr>
						<label class="rb-switcher model9">
							<input type="checkbox" class = "Boxes2" name="CBTwo[]" value="9" />
							<i></i>
						</label>10. Random Selection<hr>
						<label class="rb-switcher model10">
							<input type="checkbox" class = "Boxes2" id = "AV" name="CBTwoAllVenues" value="TRUE" />
							<i></i>
						</label>11. All Venues
						<br><br>
						<section class="gradient">
							<input type="submit" name="SubmitTopRight" value="Run" onclick="showLoader()">
						    <input type="reset" name="CancelTopRight" value="Reset"/>
						</section>
					<!--</form>-->
					<br>
				</div>

				<script>
				function showloader(){
					document.getElementById("loader").style.visibility = 'visible';
				}
				</script>
				
				<div class = "slide-out-div-bottomLeft">
					<a class = "handleBottomLeft" href = "http://link-for-non-js-users">Content</a><br>
					<!--<form id = "bottomLeft" name = "bottomLeft" action = "api.php" method = "POST">-->
						<label class = "heading">Profiles:</label><br><br>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="ArtLover" value="ArtLover"/>
							<i></i>
						</label> 
						<label title = "This profile has a bias of 3 for the category Arts & Entertainment"> ArtLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="FoodLover" value="FoodLover" />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Food"> FoodLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="NightLover" value="NightLover" />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Nightlife Spot"> NightLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="OutdoorsLover" value="OutdoorsLover" />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Outdoors & Recreation"> OutdoorsLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="shoppingLover" value="shoppingLover"/>
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Shop & Service"> ShoppingLover</label><br><br>


						<section class="gradient">
							    <!--<input type="submit" name="SubmitBottomLeft" value="Submit"/>-->
							    <input type="reset" name="CancelBottomLeft" value="Reset"/>
						</section>
						<br><br>
						<a class="btn" level-popup-open="popup-1" href="#">
							<section class="gradient">
								<button name="customizeBtn" onclick = "setCustomizeText()">Customize</button> 
								<input type = "text" name = "customizeText" id = "customizeText" size = "3" value = "0" style="display: none"/>
							</section>	
						</a>
						

						
						<div class="popup1" level-popup="popup-1">
							<div class="popup1-inner">
									
									
								<table class = "table2">
										<?php
										for($j = 0;$j<10;$j++){
									 ?>		
											<th>
											<label style = "font-size: 20px"><?php echo $level1[$j]; ?>
											</th>
									<?php

											for($i=0;$i<sizeof($level2[$j]);$i+=3)
											{
									?>
												<tr>
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
											}
										}
									?>
									

								</table>
								<br><br>
								
								<p><center>
									<a level-popup-close="popup-1" href="#">
										<section class="gradient">
											<!--<input type="submit" name="ConfirmBias" value="Confirm">-->
											<button name="ConfirmBias">Confirm</button>
										</section>
									</a><br>
									<a class = "header" target="_blank" href="#" onclick = "event.preventDefault()">
										<section class="gradient">
											<button name='popreset' onclick = "resetValues()">Reset </button>
										</section>
									</a>
								</center></p>
								<!--<section class="gradient">
								<button onclick = "resetValues()">Reset </button>
								</section>-->
								<a class="popup1-close" level-popup-close="popup-1" href="#">x</a>
								
								
									
							</div>

						</div>
						
				</div>
				<div class = "slide-out-div-bottom">
					<a class = "handleBottom" href = "http://link-for-non-js-users">Content</a><br>
					<!--<form id = "bottomLeft" name = "bottomLeft" action = "api.php" method = "POST">-->
						<label class = "heading">here:</label><br><br>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="ArtLover" value="ArtLover"/>
							<i></i>
						</label> 
						<label title = "This profile has a bias of 3 for the category Arts & Entertainment"> ArtLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="FoodLover" value="FoodLover" />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Food"> FoodLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="NightLover" value="NightLover" />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Nightlife Spot"> NightLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="OutdoorsLover" value="OutdoorsLover" />
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Outdoors & Recreation"> OutdoorsLover</label><hr>
						<label class="rb-switcher">
							<input type="checkbox" class = "Boxes3" name="CBThree[]" id="shoppingLover" value="shoppingLover"/>
							<i></i>
						</label>
						<label title = "This profile has a bias of 3 for the category Shop & Service"> ShoppingLover</label><br><br>


						<section class="gradient">
							    <!--<input type="submit" name="SubmitBottomLeft" value="Submit"/>-->
							    <input type="reset" name="CancelBottomLeft" value="Reset"/>
						</section>
						<br><br>
						<a class="btn" level-popup-open="popup-1" href="#">
							<section class="gradient">
								<button name="customizeBtn" onclick = "setCustomizeText()">Customize</button> 
								<input type = "text" name = "customizeText" id = "customizeText" size = "3" value = "0" style="display: none"/>
							</section>	
						</a>
						

						
						<div class="popup1" level-popup="popup-1">
							<div class="popup1-inner">
									
									
								<table class = "table2">
										<?php
										for($j = 0;$j<10;$j++){
									 ?>		
											<th>
											<label style = "font-size: 20px"><?php echo $level1[$j]; ?>
											</th>
									<?php

											for($i=0;$i<sizeof($level2[$j]);$i+=3)
											{
									?>
												<tr>
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
											}
										}
									?>
									

								</table>
								<br><br>
								
								<p><center>
									<a level-popup-close="popup-1" href="#">
										<section class="gradient">
											<!--<input type="submit" name="ConfirmBias" value="Confirm">-->
											<button name="ConfirmBias">Confirm</button>
										</section>
									</a><br>
									<a class = "header" target="_blank" href="#" onclick = "event.preventDefault()">
										<section class="gradient">
											<button name='popreset' onclick = "resetValues()">Reset </button>
										</section>
									</a>
								</center></p>
								<!--<section class="gradient">
								<button onclick = "resetValues()">Reset </button>
								</section>-->
								<a class="popup1-close" level-popup-close="popup-1" href="#">x</a>
								
								
									
							</div>

						</div>
						
				</div>
				
			</form>
			
			<script type="text/javascript">

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
				
				

			</script>
			
			<div id = "bottomRight" class = "slide-out-div-bottomRight">
				<a class = "handleBottomRight" href = "http://link-for-non-js-users">Content</a><br>
				<div id = "table-scatterPlot">
					<h3><font color="#f4c20f">Results:</font></h3>
					<table class = "table1" style = "width : 100%">

						<tr>
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


					</table><br>
				</div>
			
				
				<script>
					<?php if( ((!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ) && !$errorFlag ) {?>

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
								modelMarkers[i].setMap(map);
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
							}						
						}
					}
					<!--For scatterplot-->
				   	function scatterPlot(){
				   		//alert("Yo inside scatterPlot()");
						   	var data = [];
						   	//var venNameString = "<?php $venName = implode(',', $venueName); echo $venName; ?>" ; 
						   	var divString = "<?php $div = implode(',', $diversity); echo $div; ?>" ;
						   	var relString = "<?php $rel = implode(',', $relevancy); echo $rel; ?>" ;
						   	var divArray = divString.split(",");
						   	var relArray = relString.split(",");

						   	var modelNameString = "<?php $modNameStr = implode(',', $model); echo $modNameStr; ?>" ;
							var modelNameArray = modelNameString.split(",");

							for(var i = 0;i<"<?php echo sizeof($modelsSelected) ; ?>";i++){
								var xArr = [relArray[i]];
								var yArr = [divArray[i]];
								
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
									range: [ 0, 1.05 ] 
								},
								yaxis: {
									title: 'Diversity',
									range: [0, 1.05]
								},
								title:'Relevance(x) Vs Diversity(y) - Scatter plot'
							};
							//document.getElementById('table-scatterPlot').style.display = "none";
							Plotly.newPlot('sp', data, layout); 		   	
							//Popup.show('simplediv');
				   		
				   	}


				   	<?php } ?>
				   	
				</script>
				
				<a class="btn" data-popup-open="popup-1" href="#" onClick = "scatterPlot()">
					<section class="gradient">
						<button>Scatter Plot</button>
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
						<button onclick = "setStats()">Compare</button>
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
					document.getElementsByName('CBTwo[]')[0].checked = false;
					<?php 
					if(!empty($_POST['CBTwo'])){

						foreach($_POST['CBTwo'] as $t) { 
					?>  
							for(var i=0;i<=9;i++){
								if(document.getElementsByName('CBTwo[]')[i].value == "<?php echo $t; ?>" ){
									//alert(" if "+i);							
									document.getElementsByName('CBTwo[]')[i].checked = true;
								}	
							}
					<?php 
						}
					} 	?>
					<?php
					if(!empty($_POST['CBTwoAllVenues'])){
					?>
						document.getElementById('AV').checked = true;
					<?php
					}
					?>
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

		<!--Map functionality-->
		<script type = "text/javascript">
			
			var modelMarkers = [];
			var map;
			var userLocation;
			var userMarker = [];
			function initMap(){
				
				 //contains the markers
				//To adjust the map's bounds according to the locations shown
				var bounds = new google.maps.LatLngBounds();
				//To show some info when the marker is clicked
				var infowindow = new google.maps.InfoWindow();

				var myLatLng;

				//alert("before if");
				//if(!document.getElementById('lat') || !document.getElementById('lon'))
				//If both latitude and longitude fields are empty, just give the center of both cities
				if(document.getElementById('lat').value == "" && document.getElementById('lon').value == "")
				{
					//alert("if");
					if(!document.getElementById('city').value.localeCompare("NewYork")){
						//alert("ifif");
						myLatLng = new google.maps.LatLng(40.730608477796636, -74.10964965820312) ; //New York's center
						document.getElementById('lat').value = 40.730608477796636;			// var newYork = {lat: 40.7128,lng: -74.0059};
						document.getElementById('lon').value = -74.10964965820312;
					}
					else{
						//alert("elseif");
						myLatLng = new google.maps.LatLng(37.797666, -122.430658);	//san Francisco's center
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
					}
					else if(!document.getElementById('city').value.localeCompare("SanFrancisco") && (x < 37.836010 && x > 37.706632 && y < -122.356578 && y > -122.534743) ){
						//alert("elseelseif");
						myLatLng = new google.maps.LatLng(xStr, yStr);
					}
					else{
						//alert("if");
						if(!document.getElementById('city').value.localeCompare("NewYork")){
							//alert("elseelseif");
							myLatLng = new google.maps.LatLng(40.7128, -74.0059) ; //New York's center
							document.getElementById('lat').value = 40.7128;			// var newYork = {lat: 40.7128,lng: -74.0059};
							document.getElementById('lon').value = -74.0059;
						}
						else{
							//alert("elseelseelse");
							myLatLng = new google.maps.LatLng(37.797666, -122.430658);	//san Francisco's center
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
			</script>
			
			<script type="text/javascript">
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
					//markers.push(marker);

				}
				else{
					alert("Please select a location within boundaries of "+document.getElementById('city').value);				
				}
			}
			// Deletes all markers in the array by removing references to them.
			function deleteMarkers() {
				setMapOnAll(null); //clears all markers
				markers = [];
			}
			// Sets the map on all markers in the array.
			function setMapOnAll(map) {
			  for (var i = 0; i < modelMarkers.length; i++) {
			    modelMarkers[i].setMap(map);
			  }
			}

			function getLocation(event){
				var location = event.latLng; //location of the click event
				document.getElementById("lat").value = location.lat();
				document.getElementById("lon").value = location.lng();
				addMarker(location);

			}
			
			function addM(location, colorIndex, name){
				//alert(location.toString());

				//links to change the colors of the markers on the map--just create a image variable and assign this links to it. Then add icon : image in marker
				//After v1 first parameter is the label..It will be shown inside the marker--Second parameter is hexadecimal representation of color for the marker
				//See this link for more details http://googlemapsmarkers.com/
				var colors = [	"http://www.googlemapsmarkers.com/v1/1/ff0000/",
								"http://www.googlemapsmarkers.com/v1/2/00ff00/",
								"http://www.googlemapsmarkers.com/v1/3/0000ff/",
								"http://www.googlemapsmarkers.com/v1/4/ffff00/",
								"http://www.googlemapsmarkers.com/v1/5/ff00ff/",
								"http://www.googlemapsmarkers.com/v1/6/00ffff/",
								"http://www.googlemapsmarkers.com/v1/7/003300/",
								"http://www.googlemapsmarkers.com/v1/8/663300/",
								"http://www.googlemapsmarkers.com/v1/9/0f0f0f/",
								"http://www.googlemapsmarkers.com/v1/10/003366"
				];

				var marker = new google.maps.Marker({
					//new google.maps.LatLng(-34.397, 150.644) //not changed yet
	   				position: location,
				    map: map,
				    icon : colors[colorIndex]
				});
				/*
				marker.desc = name; //tried for overlapping markers
				oms.addMarker(marker);
				*/
				//alert("name: "+name);
				var infowindow = new google.maps.InfoWindow({
					content: name
				});
				//alert(name);
				marker.addListener('click', function() {
						infowindow.open(map, marker);
				});
				
				modelMarkers.push(marker);
				//alert("add the end of addM function");
				//bounds.extend(marker1.position);
				//map.fitBounds(bounds);

			}

			</script>
			<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR2GsY0vt8frdFcA_TdFbPRuQCeYQqAKM&signed_in=true&callback=initMap">
			</script>
			
			<script type = "text/javascript">
				<?php if( ((!empty($_POST['SubmitTopLeft'])) || (!empty($_POST['SubmitTopRight'])) || (!empty($_POST['SubmitBottomLeft'])) ) && !$errorFlag ) {?>
				//alert("inside IF code");
				function resultMarkers(){
					//alert("resultMarkers() called--inside");
					var venLocString = "<?php $venLoc = implode(',', $venueLocation); echo $venLoc; ?>" ; 
					//locations of the places to be displayed
					var locations = [];
					var locArray = venLocString.split(",");
					for(var i = 0;i< locArray.length ; i++){
						var locSplit = locArray[i].split(";");
						locations.push(new google.maps.LatLng(locSplit[0], locSplit[1]));
					}
				

					var modelString = "<?php $modStr = implode(',', $modelsSelected); echo $modStr; ?>" ;
					var modelArray = modelString.split(",");
					
					var venNameString = "<?php $venName = implode(',', $venueName); echo $venName; ?>" ; 
					//Names of the places to be displayed
					var names = venNameString.split(",");
					var directionsService = new google.maps.DirectionsService;
					var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
	
					for(i=0;i<locations.length;i++)
					{
						var k = "<?php echo $topK[0]?>";
						//alert("k value: "+k);
						//get the color which matches with the algorithm value (0-9)
						var colorIndex = modelArray[Math.floor(i/k)];
						//alert("Color Index: "+colorIndex);
						//alert("beforecall");	
						//alert(locations[i]);
						//alert(names[i]);
						addM(locations[i], colorIndex, names[i]);
						//if(i!=locations.length-1)
						
						
						
					}
					 var waypts = [];
					 var json_data;

					 
					  for (var i = 1; i < locations.length-1; i++) {
						
						  waypts.push({
							location: locations[i],
							stopover: false
						  });
						}
						calculateAndDisplayRoute(directionsService, directionsDisplay,locations,waypts);
				function calculateAndDisplayRoute(directionsService, directionsDisplay,locations,waypts) {
						directionsService.route({
						  origin: locations[0],
						  destination: locations[locations.length-1],
						  travelMode: 'DRIVING',
						  optimizeWaypoints:true,
						   waypoints: waypts
						}, function(response, status) {
						  if (status === 'OK') {
							directionsDisplay.setDirections(response);
							//json_data=response;
							json_data=JSON.stringify(response);
							localStorage.setItem("response",json_data);
							alert( response.routes[0].legs[0].duration.text );
						  } else {
							window.alert('Directions request failed due to ' + status);
						  }
						});
					} 
					
					//var json_data=JSON.stringify(response);
					//localStorage.setItem("response",json_data);
					//localStorage.setItem("dodo",json_data.routes[0].legs[0].duration.text);
					
					/*
					google.maps.event.addListener(marker, 'click', function() {
							//var add = names[i];
							infowindow.setContent('Panera Bread'); 
							infowindow.open(map,marker);
					});
					*/

					}
				resultMarkers();

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
				<?php } ?>


			</script>

			
		
	</body>
</html>