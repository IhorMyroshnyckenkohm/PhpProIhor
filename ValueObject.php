<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed()
    {
        return $this->red;
    }

    public function setRed($red)
    {
        $this->validateColorComponent($red);
        $this->red = $red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function setGreen($green)
    {
        $this->validateColorComponent($green);
        $this->green = $green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    public function setBlue($blue)
    {
        $this->validateColorComponent($blue);
        $this->blue = $blue;
    }

    public function equals(ValueObject $otherColor)
    {
        return $this->red === $otherColor->getRed()
            && $this->green === $otherColor->getGreen()
            && $this->blue === $otherColor->getBlue();
    }

    public static function random()
    {
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);

        return new self($red, $green, $blue);
    }

    public function mix(ValueObject $otherColor)
    {
        $mixedRed = ($this->red + $otherColor->getRed()) / 2;
        $mixedGreen = ($this->green + $otherColor->getGreen()) / 2;
        $mixedBlue = ($this->blue + $otherColor->getBlue()) / 2;

        return new self($mixedRed, $mixedGreen, $mixedBlue);
    }

    private function validateColorComponent($component)
    {
        if ($component < 0 || $component > 255) {
            throw new InvalidArgumentException("Invalid color component. It must be in the range 0-255.");
        }
    }
}


$color = new ValueObject(23, 14, 42);
$mixedColor = $color->mix(new ValueObject(255, 12, 12));

?>
<label>
    <input type="color" value="<?= sprintf("#%02X%02X%02X", $mixedColor->getRed(), $mixedColor->getGreen(), $mixedColor->getBlue()) ?>">
</label>

