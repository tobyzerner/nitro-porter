<?php

namespace PorterTest;

use nadar\quill\Lexer as Quill;
use s9e\TextFormatter\Bundles\Fatdown as Markdown;
use PHPUnit\Framework\TestCase;
use Porter\Parser\Flarum\ImageEmbed;

final class ParserTest extends TestCase
{
    /**
     * @covers ImageEmbed::process
     */
    public function testQuillCanParseExternalEmbed(): void
    {
        $stored = '[{"insert":{"embed-external":{"data":{"url":' .
            '"https:\/\/example.com\/uploads\/779\/8C8NUCDYD6ZW.png","name":"auto-draft-6.png","type":"image",' .
            '"size":92198,"width":500,"height":545,"mediaID":34100,"dateInserted":"2020-01-11T03:21:13+00:00",' .
            '"insertUserID":4708,"foreignType":"embed","foreignID":4708,"format":null,"bodyRaw":null},' .
            '"loaderData":{"type":"image"}}}},{"insert":"\n"}]'; // post id 953302
        $stored = '{"ops":' . $stored . '}'; // Fix the JSON.
        $lexer = new Quill($stored);
        $lexer->registerListener(new \Porter\Parser\Flarum\ImageEmbed());
        $result = $lexer->render();
        $expected = '<UPL-IMAGE-PREVIEW url="https://example.com/uploads/779/8C8NUCDYD6ZW.png">' .
            '[upl-image-preview url=https://example.com/uploads/779/8C8NUCDYD6ZW.png]</UPL-IMAGE-PREVIEW>';
        $this->assertStringContainsString($expected, $result);
    }

    /**
     * @covers Formatter::toTextFormatter
     */
    public function testFatdownCanParseHtml(): void
    {
        $stored = '<b>Avant </b>de poster dans le forum la présentation est <b><u>obligatoire</u> </b>ici :&nbsp;
            <a rel="nofollow" href="https://routeur4g.fr/discussions/categories/pr%C3%A9sentation">Présentation</a>
            &nbsp;avec dans le titre le pseudo.<br><span>Cela permet d\'en savoir plus sur votre matériel/lieu de
            vie/niveau technique. Pas besoin de faire un roman mais expliquez pourquoi vous en êtes venu à la 4G nous
            permet de vous donner de bons conseils.&nbsp;<br></span>';
        $stored = Markdown::parse($stored);
        $result = Markdown::render($stored);
        $expected = '<p><b>Avant </b>de poster dans le forum la présentation est <b><u>obligatoire</u> </b>ici : 
            <a href="https://routeur4g.fr/discussions/categories/pr%C3%A9sentation">Présentation</a>
             avec dans le titre le pseudo.<br><span>Cela permet d’en savoir plus sur votre matériel/lieu de
            vie/niveau technique. Pas besoin de faire un roman mais expliquez pourquoi vous en êtes venu à la 4G nous
            permet de vous donner de bons conseils. <br></span></p>';
        $this->assertStringContainsString($expected, $result);
    }
}
