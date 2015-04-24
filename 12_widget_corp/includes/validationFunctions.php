 <?php




$errors = array();


// PRESENCE (VALUE EXISTS)
function has_presence ($value){
    return isset($value) && $value !== "";
    // True if a value is set and it's not an empty string
    // Boolean result
}




// STRING LENGTH (VALUE IS A CERTAIN NUMBER OF CHARACTERS)
// MAXIMUM LENGTH
function exceeds_max_length ($value, $max){
    return strlen($value) > $max;
    // True if value exceeds max length set
}



// INCLUSION IN A SET (VALUE MUST BE A VALUE FROM A SET OF CHOICES EG MALE/FEMALE)
function isInSet ($value, $set) {
    in_array($value, $set);
    // True if value passed exists in set passed
}