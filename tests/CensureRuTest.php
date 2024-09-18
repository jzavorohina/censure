<?php

use PHPUnit\Framework\TestCase;
use Censure\Censure;
require_once("Censure.class.php");

class CensureRuTest extends TestCase
{

    /**
     * @dataProvider providerPower
     */
    public function testFix($text, $isBadExpected, $textExpected)
    {
        $isBad = Censure::is_bad($text);
        $replace = Censure::replace($text);
        $this->assertEquals($isBadExpected, $isBad);
        $this->assertEquals($textExpected, $replace);
    }

    public function providerPower()
    {
        return array(
            array('Анальная', true, '***'),
            array('Анальная, анус, анусе', true, '***, ***, ***'),
            array('Бздун, бздит, бля, блядская, блядь', true, '***, ***, ***, ***, ***'),
            array(
                'Вафел, вафлер / вафлЁр, вафлерка / вафлёрка, вафлеглот, вафлист, вафлили, вафлисткие вафли',
                true,
                '***, *** / ***, *** / ***, ***, ***, ***, *** вафли'
            ),
            array(
                'Вмандиться, вмандякаться, вмандячиться, вмандохаться, вмандошиться, вмандяшиться, вмандяхаться, вмандюриться, вмандяриться, вмудохаться',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Вошка, ядрена вошь, мондавошка, впендюривали, впизду / в пизду, вздрочнул / вздрачил',
                true,
                '***, *** ***, ***, ***, *** / в ***, *** / ***'
            ),
            array(
                'Впиздрониться, впиздячиться, впиздюриться, впиздохаться, впиздошиться, впиздюлиться, впиздяриться, впиздюхаться, впиздяхаться, впиздяшиться',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array('Вхуяриться, вхуякаться, вхуячиться, вхуйнуться', true, '***, ***, ***, ***'),
            array(
                'Въебаться, въебениться, въебёхаться / въебехаться, въебуриться, в ебеню феню',
                true,
                '***, ***, *** / ***, ***, в *** феню'
            ),
            array('Высер, мегавысер', true, '***, ***'),
            array(
                'Говном, говно-люди, говна, говница, говенных, говнище, говенный',
                true,
                '***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Голощелка, гомик, гомиков, гомосятина, гондон, гумозник',
                true,
                '***, ***, ***, ***, ***, ***'
            ),
            array(
                'Давалка, даваха, дерьмовая, дилдо, додик, доебизм, дойки, долбаная, долбежка, долбоебов',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Допиздишься, дососать, досасывая, доснашиваясь, досношаться, досикать, досикивать, досирать, доусеру, доусрачки',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Дристополет, обдристать, дрочка, драчильня, задрочили, дрючить, дуплиться',
                true,
                '***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Ебанько, ебеня, ебеня, еблан, ебнутая, ерепениться, eдрёная, едрить, ерундовая, ёбнутая',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Жид, жидовская, жопа, жопянная, жопник, жопочник, жопошник',
                true,
                '***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Забулдыга, загадить, зад, задница, задрот, задротище, заноза, зануда, зараза',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array('Засранец, засранка, засеря, затычка', true, '***, ***, ***, ***'),
            array('Идиот, идиотка, измандякаться, йух', true, '***, ***, ***, ***'),
            array(
                'Карга, клитор, кобель, кобелина, кретин, курва',
                true,
                '***, ***, ***, ***, ***, ***'
            ),
            array('Лох, лохушка, лахудра, легавый, лупоглазый', true, '***, ***, ***, ***, ***'),
            array(
                'Мандавошка, манда, монда, мондавошка, маразматик, мегера, мент, мерзавец, мразь',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array('Мудак, мудило, мудила, мудозвон, мудохаться', true, '***, ***, ***, ***, ***'),
            array('Наёбка, наебали, ничтожество', true, '***, ***, ***'),
            array(
                'Обалдуй, обосранец, обосраться, образина, остолоп, отребье, отрепье, отродье, охуенчик',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Падаль, падла, паскуда, паскудный, потаскуха, паразит, пентюх, перечница, пиздатая, пизда',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Подонок, подстилка, позорник, порнуха, полудурок, потаскун, потаскуха, придурок, прихвостень, прорва',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Пройдоха, проститутка, прохвост, прохиндей, проходимец, пустобрёх, пустозвон, пустомеля, пьянчуга, пьянь',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Разъебать, раздолбай, распиздяйство, рвань, ренегат, рогоносец',
                true,
                '***, ***, ***, ***, ***, ***'
            ),
            array(
                'Сброд, сволочь, соси, сосать, срать, ссать, стерва, сука, сукин, сучка',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Тварь, тёлка, толстозадый, тошнотворное, трахать, трепотня, тряпка, тупица, тупоголовый, туполобый, тупоумный, тягомотину',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Ублюдок, ублюдошный, уебан, уебище, урод, уродка',
                true,
                '***, ***, ***, ***, ***, ***'
            ),
            array('Фаллос, фефела, фефёла, фефёлка, фофан, фуфло, фуфлогон', true, '***, ***, ***, ***, ***, ***, ***'),
            array(
                'Хайло, халда, нахера, хлюст, хмырь, холуй, холуйство, холуйствуют, хрен, хреновина, хрыч',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Хуй, хуя, дохуя, охуеть, хуле, хуяк-хуяк, хуярить, хуячить',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Целка, черножопый, чернозадый, черномазый, чинодрал, чмо, чурбан, чучело',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Шалава, шалашовка, шантрапа, шаромыжник, шваль, шизоид, шлюха, шлюшка, шушера',
                true,
                '***, ***, ***, ***, ***, ***, ***, ***, ***'
            ),
            array(
                'Щекотильник, эрекция, юлда, юлдак, ядрёна, ядрена, ядрить',
                true,
                '***, ***, ***, ***, ***, ***, ***'
            )

        );
    }
}
