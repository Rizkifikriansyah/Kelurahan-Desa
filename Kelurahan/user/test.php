<?php

$apiKey = "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";

$data = [
    "model" => "gpt-4.1-mini",
    "messages" => [
        [
            "role" => "user",
            "content" => "Halo"
        ]
    ]
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $apiKey
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo curl_error($ch);
}

curl_close($ch);

echo "<pre>";
print_r($response);
?>