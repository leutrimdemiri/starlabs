<?php
header('Content-type: text/plain');

class DiamondShape
{
    private array $alphabet;
    private int $maxSize;

    public function __construct(
        private string $letter,
        private string $delimiter = "*")
    {
        $this->alphabet = range('A', $letter);
        $this->maxSize = 2 * count($this->alphabet) - 1;
    }

    public function outputToHtml(): string
    {
        return $this->toString("\n");
    }

    public function toString($linebreak = "\n"): string
    { 
        $output = '';
        foreach ($this->alphabet as $pos => $letter) {
            $output .= $this->drawRowForLetter($letter, $pos);
            $output .= $linebreak;
        }

        $revAlphabet = $this->alphabet;
        $revAlphabet = array_slice(
            array_reverse($revAlphabet, true),
            1,
            count($this->alphabet) - 1,
            true
        );

        foreach ($revAlphabet as $pos => $letter) {
            $output .= $this->drawRowForLetter($letter, $pos);
            $output .= $linebreak;
        }

        return $output;
    }

    private function drawRowForLetter(string $letter, int $pos)
    {
        $row = '';
        $centerCount = $pos === 0 ? 0 : ($pos - 1) * 2 + 1;
        $row = str_pad($row, $centerCount, $this->delimiter, STR_PAD_BOTH);
        $row = $pos === 0 ? $letter : sprintf('%s%s%s', $letter, $row, $letter);
        $row = str_pad($row, $this->maxSize, $this->delimiter, STR_PAD_BOTH);

        return $row;
    }
}

$diamondCard = new DiamondShape('E'); // Diamond for letter 'E':
echo $diamondCard->outputToHtml(); 