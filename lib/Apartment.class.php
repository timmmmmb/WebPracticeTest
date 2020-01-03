<?php 

class Apartment {
	
	// Data storage file
	const DATA_FILE = "data/apartments.xml";
	
	// Holds the data of an apartment
	private $data;
	
	/**
	 * Creates a new instance based on the passed data.
	 * 
	 * @param XML entity representing an apartment
	 */
	private function __construct($data) {
		$this->data = $data;
	}
	
	/**
	 * Retrieves all apartments.
	 * 
	 * @return An array of Apartments
	 */
	public static function getApartments() {
		$xml = simplexml_load_file(self::DATA_FILE);
		$apartments = array();
		foreach($xml->apartment as $apartment) {
			$apartments[] = new Apartment($apartment);
		}
		return $apartments;
	}
	
	/**
	 * Retrieves a single apartment by id.
	 * 
	 * @param The id of the apartment
	 * @return An Apartment or null if there is no apartment for the passed id
	 */
	public static function getApartmentById($id) {
		$xml = simplexml_load_file(self::DATA_FILE);
		$apartment = $xml->xpath("apartment[id=$id]");
		if ($apartment) {
			$apartment = new Apartment($apartment[0]);
		} 
		return $apartment;
		
	}
	
	/**
	 * Gets the id of the apartment.
	 * 
	 * @return The id
	 */
	public function getId() {
		return $this->data->id;
	}
	
	/**
	 * Gets the slogan of the apartment.
	 * 
	 * @return The Slogan
	 */
	public function getSlogan() {
		return $this->data->slogan;
	}
	
	/**
	 * Gets the street of the apartment.
	 *
	 * @return The Street
	 */
	public function getStreet() {
		return $this->data->street;
	}
	
	/**
	 * Gets the zip of the apartment.
	 *
	 * @return The zip
	 */
	public function getZip() {
		return $this->data->zip;
	}
	
	/**
	 * Gets the city of the apartment.
	 *
	 * @return The city
	 */
	public function getCity() {
		return $this->data->city;
	}
	
	/**
	 * Gets the number of rooms of the apartment.
	 *
	 * @return The number of rooms as string
	 */
	public function getRooms() {
		return $this->data->rooms;
	}
	
	/**
	 * Gets the floor of the apartment.
	 *
	 * @return The floor
	 */
	public function getFloor() {
		return $this->data->floor;
	}
	
	/**
	 * Gets the space of the apartment.
	 *
	 * @return The space in m2
	 */
	public function getSpace() {
		return $this->data->space;
	}
	
	/**
	 * Gets the net rent of the apartment.
	 *
	 * @return The net rent in CHF per month
	 */
	public function getNetRent() {
		return $this->data->net_rent;
	}
	
	/**
	 * Gets the additional costs of the apartment.
	 *
	 * @return The additional expenses in CHF per month
	 */
	public function getAdditionalExpenses() {
		return $this->data->additional_expenses;
	}
	
	/**
	 * Gets the available date of the apartment.
	 *
	 * @return The available date
	 */
	public function getAvailable() {
		return $this->data->available;
	}
	
	/**
	 * Gets the description of the apartment.
	 *
	 * @return The description
	 */
	public function getDescription() {
		return $this->data->description;
	}
	
	/**
	 * Gets the image names of the apartment. The images are stored in
	 * the folder assets/images
	 *
	 * @return The image names as an array
	 */
	public function getImages() {
		$images = [];
		foreach ($this->data->images->image as $image) {
			$images[] = $image->src;
		}
		return $images;
	}
	
	/**
	 * Gets the image descriptions.
	 *
	 * @return The image descriptions as an array corresponding to the images
	 */
	public function getImageDescriptions() {
		$descriptions = [];
		foreach ($this->data->images->image as $image) {
			$descriptions[] = $image->description;
		}
		return $descriptions;
	}
	
	/**
	 * Gets the rent (net rent + additional expenses) of the apartment.
	 *
	 * @return The rent in CHF per month
	 */
	public function getRent() {
		return $this->data->net_rent + $this->data->additional_expenses;
	}
	
}