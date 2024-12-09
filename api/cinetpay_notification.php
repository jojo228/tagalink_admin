<?php
// URL de notification CinetPay

// Lire les données POST
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cpm_trans_id']) || !isset($data['cpm_site_id'])) {
    http_response_code(400);
    echo 'Paramètres manquants';
    exit();
}

$transaction_id = $data['cpm_trans_id'];
$site_id = $data['cpm_site_id'];

// Appel API pour vérifier la transaction
$apikey = "141746675066dc1f27b3b790.79006921";
$url = "https://api-checkout.cinetpay.com/v1/?method=checkPayStatus&apikey=$apikey&cpm_site_id=$site_id&cpm_trans_id=$transaction_id";

$response = file_get_contents($url);
$result = json_decode($response, true);

if ($result['transaction']['cpm_result'] === '00') {
    // Paiement réussi, mettre à jour la base de données
    http_response_code(200);
    echo 'Paiement accepté';
} else {
    // Paiement échoué
    http_response_code(400);
    echo 'Paiement échoué';
}
?>
