<?php
declare(strict_types = 1);
$data = generateArrayFromInput(trim(fgets(STDIN)));
echo generateXmlFromArray($data);
function generateArrayFromInput(string $input): array
{
    $result = [];
    $input = explode(", ", $input);                   // Maiking array(separating) of questions ans answers.
    for ($i = 0; $i < count($input); $i += 2) {       // Grouping Questions and Answers in Associative Array.
        $question = $input[$i];
        $answer = $input[$i + 1];
        $result[$question] = $answer;
    }
    return $result;
}
function generateXmlFromArray(array $associativeArray): string
{
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= "<quiz>\n";
    foreach ($associativeArray as $question => $answer) {
        $xml .= "  <question>\n    {$question}\n  </question>\n";
        $xml .= "  <answer>\n    {$answer}\n  </answer>\n";
    }
    $xml .= "</quiz>";
    return $xml;
}