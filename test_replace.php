<?php
require('Censure.class.php');

function test($title, $text, $replace) {
    if (testFix($title, $text, $replace)) {
        echo "test is passed! V\n\n";
    } else {
        echo "test is not passed! X\n\n";
    }
}

function testFix($title, $text, $check) {
    $start = microtime(true);
    $result = Censure::fix($text);
    echo $title . "\n";
    echo "fix: " . $result . "\n";
    $end = microtime(true);
    echo "time: " . number_format(microtime(true) - $start, 10) . "\n";
    return !!($check === $result);
}

// Пиздеж пизд[а-я]+ (Это пиздёж!)
// fix: Это пустой лживый разговор!
test('1. Пиздеж','Это пиздёж!','Это пустой лживый разговор!');

// Пизданутая пизд[а-я]+ (Я те говорил, она на всю башку пизданутая!)
// fix: Я те говорил, она на всю башку глупая!
test('2. Пизданутая','Я те говорил, она на всю башку пизданутая!','Я те говорил, она на всю башку глупая!');

// Пиздатый пизд[а-я]+ (Пиздатый фильм.)
// fix: крутой фильм.
test('3. Пиздатый','Пиздатый фильм.','Крутой фильм.');

// Пиздато пизд[а-я]+ (Пиздато говоришь.)
// fix: хорошо говоришь.
test('4. Пиздато','Пиздато говоришь.','Хорошо говоришь.');

// Пизденеть пизд[а-я]+ (Как только услышит Таня слово ***, так начинает пизденеть.)
// fix: Как только услышит Таня слово хуй, так начинает балдеть.
test('5. Пизденеть','Как только услышит Таня слово ***, так начинает пизденеть.','Как только услышит Таня слово ***, так начинает балдеть.');

// Пиздеть пизд[а-я]+ (Только если перестанет пиздеть.)
// fix: Только если перестанет болтать чепуху.
test('6. Пиздеть','Только если перестанет пиздеть.','Только если перестанет болтать чепуху.');

// Пиздецовый пизд[а-я]+ (Вы собираетесь отменить этот пиздецовый карнавал?)
// fix: Вы собираетесь отменить этот хороший карнавал?
test('7. Пиздецовый','Вы собираетесь отменить этот пиздецовый карнавал?','Вы собираетесь отменить этот хороший карнавал?');

// Пиздец пизд[а-я]+ (Увижу вас еще раз — пиздец вам, ребята.)
// fix: Увижу вас еще раз — конец вам, ребята.
test('8. Пиздец','Увижу вас еще раз — пиздец вам, ребята.','Увижу вас еще раз — конец вам, ребята.');

// Пиздоболивать пизд[а-я]+ (Пиздоболивать могут часами.)
// fix: говаривать могут часами.
test('9. Пиздоболивать','Пиздоболивать могут часами.','Говаривать могут часами.');

// Пиздоболить пизд[а-я]+ (Хорош пиздоболить, пора за работу приниматься.)
// fix: болтать
test('10. Пиздоболить','Хорош пиздоболить, пора за работу приниматься.','Хорош болтать, пора за работу приниматься.');

// Хуевато ху[а-я]+ (С культурой в стране хуевато.)
// fix: С культурой в стране плоховато.
test('11. Хуевато','С культурой в стране хуевато.','С культурой в стране плоховато.');

// Хуеватый ху[а-я]+ (Но план был хуеватый.)
// fix: Но план был плоховатый.
test('12. Хуеватый','Но план был хуеватый.','Но план был плоховатый.');

// Хуев ху[а-я]+ (Наслаждение доставляло ему это зрелище, будто никогда в более подходящей обстановке голых девок не видел, извращенец хуев.)
// fix: Наслаждение доставляло ему это зрелище, будто никогда в более подходящей обстановке голых девок не видел, извращенец презренный.
test('14. Хуев','Наслаждение доставляло ему это зрелище, будто никогда в более подходящей обстановке голых девок не видел, извращенец хуев.',
'Наслаждение доставляло ему это зрелище, будто никогда в более подходящей обстановке голых девок не видел, извращенец презренный.');

// Хуёво ху[а-я]+ (Хуёво греют батареи!)
// fix: Плохо греют батареи!
test('13. Хуёво','Хуёво греют батареи!','Плохо греют батареи!');

// Хуёвый ху[а-я]+ (И человек он хуёвый, и поэт так себе.)
// fix: И человек он плохой, и поэт так себе.
test('15. Хуёвый','И человек он хуёвый, и поэт так себе.','И человек он плохой, и поэт так себе.');

// Хуёвина ху[а-я]+ (Такая вот хуёвина приключилась.)
// fix: Такая вот ерунда приключилась.
test('16. Хуёвина','Такая вот хуёвина приключилась.','Такая вот ерунда приключилась.');

// Хуёвинка ху[а-я]+ (Какая забавная хуёвинка на днях произошла.)
// fix: Какая забавная неприятность на днях произошла.
test('17. Хуёвинка','Какая забавная хуёвинка на днях произошла.','Какая забавная неприятность на днях произошла.');

// Хуё-моё ху[а-я]+ (Пока навели порядок, хуё-моё — и день прошёл!)
// fix: то да сё
test('18. Хуё-моё','Пока навели порядок, хуё-моё — и день прошёл!','Пока навели порядок, то да сё — и день прошёл!');

// Хуеньки ху[а-я]+ (А вот хуеньки!)
// fix: А вот нет!
test('19. Хуеньки','А вот хуеньки!','А вот нет!');

// Хуета ху[а-я]+ (Это что за хуета!)
// fix: халтура
test('20. Хуета','Это что за хуета!','Это что за халтура!');
