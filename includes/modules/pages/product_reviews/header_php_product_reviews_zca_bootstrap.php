<?php
// -----
// product_reviews: Slight modification of the formatting of the 'products_model' and use of the template-specific
// splitPageResults formatting, if the ZCA Bootstrap template is installed and active.
//
// BOOTSTRAP v3.8.0
//
if (function_exists('zca_bootstrap_active') && zca_bootstrap_active()) {
    if ($review->fields['products_model'] != '') {
        $products_model = $review->fields['products_model'];
    } else {
        $products_model = '';
    }
    
    unset($reviews_split, $reviews, $reviewsArray);
    $reviews_split = new zca_splitPageResults($reviews_query_raw, zen_config('MAX_DISPLAY_NEW_REVIEWS'));
    $reviews = $db->Execute($reviews_split->sql_query);
    $reviewsArray = [];
    foreach ($reviews as $review) {
        $reviewsArray[] = [
            'id' => $review['reviews_id'],
            'customersName' => $review['customers_name'],
            'dateAdded' => $review['date_added'],
            'reviewsText' => $review['reviews_text'],
            'reviewsRating' => $review['reviews_rating']
        ];
    }
}
