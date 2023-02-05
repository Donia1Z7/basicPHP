<?php
// Program to convert Roman
// Numerals to Numbers

// This function returns
// value of a Roman symbol
function value($r)
{
	if ($r == 'I')
		return 1;
	if ($r == 'V')
		return 5;
	if ($r == 'X')
		return 10;
	if ($r == 'L')
		return 50;
	if ($r == 'C')
		return 100;
	if ($r == 'D')
		return 500;
	if ($r == 'M')
		return 1000;

	return -1;
}

// Returns decimal value
// of roman numeral
function romanToDecimal(&$str)
{
	// Initialize result
	$res = 0;

	// Traverse given input
	for ($i = 0; $i < strlen($str); $i++)
	{
		// Getting value of
		// symbol s[i]
		$s1 = value($str[$i]);

		if ($i+1 < strlen($str))
		{
			// Getting value of
			// symbol s[i+1]
			$s2 = value($str[$i + 1]);

			// Comparing both values
			if ($s1 >= $s2)
			{
				// Value of current symbol
				// is greater or equal to
				// the next symbol
				$res = $res + $s1;
			}
			else
			{
				$res = $res + $s2 - $s1;
				$i++; // Value of current symbol is
					// less than the next symbol
			}
		}
		else
		{
			$res = $res + $s1;
			$i++;
		}
	}
	return $res;
}

// Driver Code

// Considering inputs
// given are valid
echo "Enter Roman Number \n";
$r = fgets(STDIN,1024);

echo "Integer form of Roman Numeral is ",
			romanToDecimal($r), "\n";

// This code is contributed by ajit
?>
