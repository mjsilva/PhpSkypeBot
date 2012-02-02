<?php

/**
 *
 * PhpSkypeBot
 * https://github.com/flashmob/PhpSkypeBot
 * 
 * This script requires Skype4Com.dll and Sapi.SpVoice for text-to-speech.
 * Sapi.SpVoice comes pre-installed with Windows.
 *
 * download Skype4Com here:
 * http://developer.skype.com/accessories/skype4com
 *
 * and copy to C:\Program Files\Common Files\Skype\
 * then  run this command:
 *
 * regsvr32 "C:\Program Files\Common Files\Skype\Skype4COM.dll"
 *
 * Open Skype then run from the command line
 *
 */

###############################################################################
# Configuration

# Show debug messages?
define ('SHOW_MESSAGES', true);

# Bot's Skype nickname
define ('SKYPEBOT_USR', 'phpskypebot');

# Friendly name of the chat to join. Eg, set to TEST.
define ('CHAT_NAME', 'TEST');

# Atom Feed (comment out to disable this feature) 
#define ('ATOM_FEED_URI', "");

# login to atom feed (optional), format: username:password
#define ('ATOM_FEED_LOGIN', ''); 


# End of configuration
###############################################################################

$tts = new com("Sapi.SpVoice"); // text to speech
$tts->speak('Php-skype-bot, version 1.1');

$skype = new com("Skype4COM.Skype.1");


/**
 * Search for the channel using the friendly name
 */

foreach ($skype->chats as $chat) {
  echo $chat->timestamp." ".$chat->name.' '.$chat->friendlyName."\n";
  if (stripos($chat->friendlyName, CHAT_NAME)!==false) {
      $chat_name = $chat->name;
      break;
  }
}

$chat = $skype->chat($chat_name);


$mamma_jokes = array(
    "when she step on the Weight Scales it says...'to be continued'...",
    "she once went on a seafood diet...whenever she saw food she ate it!",
    "folk exercise by jogging around her!",
    "when she bends over, we enter Daylight Saving Time.",
    "she sat on a Nintendo Gamecube and it turned into a gameboy",
    "she make Kiko the Whale look like a Smartie",
    "NASA plan to use her to shore up the hole in the Ozone layer",
    "she was measured at 38-26-36 and that was just the left arm...",
    "small objects orbit her.",
    "she make olympic sumo wrestlers look anerixic.",
    "when I tell her to haul ass, she gotta make two trips.",
    "when she farted she launched herself into orbit.",
    "she lost a game at Hide&Seek only cos I spotted her...behind Mount Everest.",
    "when I had to swerve to avoid hitting her on the road I ran out of Petrol!",
    "she could be the eighth continent.",
    "she nearly put Safeway out of business",
    "the only thing that's attracted to her is gravity.",
    "her Uni graduation photo was an aerial",
    "when she auditioned for a part in Raiders of the Lost Ark she got the
part of the big Rolling Ball.",
    "she make Jabba the Hutt look anorexic.",
    "her fave food is seconds.",
    "her belt size is Equator.",
    "she eats Desert out of a Trash Can lid",
    "she wears an 'X' jacket and Copters attempt to land on her",
    "she shows up on radar.",
    "she needs a map to find her butt.",
    "she fell into the Grand Canyon....and got stuck!",
    "she wears an asteroid belt.",
    "her Passport photo says 'Picture is continued overleaf'",
    "she has TB ... 2 bellys.",
    "she's once, twice, three times a lady.",
    "she was in the Daily Record last week on page 5, 6, 7, 8, and 9.",
    "the circus use her as a trampoline",
    "stunt agencies use her as an air mattress",
    "when she opens the Fridge it says - 'I give up...'",
    "she got a new gig at the Cinema...she works as the screen",
    "she once told me 'I could eat a horse'...believe me, she wasn't kidding!",
    "she deep fries her toothpaste.");



$chuck_norris = array(
    "When Alexander Bell invented the telephone he had 3 missed calls from
Chuck Norris",
    "Fear of spiders is aracnaphobia, fear of tight spaces is
chlaustraphobia, fear of Chuck Norris is called Logic",
    "Chuck Norris doesn't call the wrong number. You answer the wrong phone.",
    "Chuck Norris won American Idol using only sign language",
    "Chuck Norris doesn't breathe... He holds air hostage.",
    "Ghosts sit around the campfire and tell Chuck Norris stories.",
    "Chuck Norris won the World Series of Poker using Pokemon cards",
    "Chuck Norris has a grizzly bear carpet in his room. The bear isn't
dead it is just afriad to move.",
    "There used to be a street named after Chuck Norris, but it was
changed because nobody crosses Chuck Norris and lives.",
    "If you rate this 5 roundhouse kicks, then Chuck Norris WILL
roundhouse kick Justin Bieber's ass.",
    "Chuck Norris died 20 years ago, Death just hasn't built up the
courage to tell him yet.",
    "When Chuck Norris plays pac-man the ghosts stay in their box",
    "Chuck Norris has already been to Mars; that's why there are no signs
of life.",
    "Some magicans can walk on water, Chuck Norris can swim through land.",
    "Chuck Norris can cut through a hot knife with butter",
    "Chuck Norris once urinated in a semi truck's gas tank as a
joke....that truck is now known as Optimus Prime.",
    "Once the cop pulled over Chuck Norris....the cop was lucky to leave
with a warning.",
    "Chuck Norris and Superman once fought each other on a bet. The loser
had to start wearing his underwear on the outside of his pants.",
    "Chuck Norris doesn't flush the toilet, he scares the sh*t out of it",
    "When Chuck Norris does push-ups, he isn't lifting himself up. He's
pushing the earth down!",
    "Life insurance premiums are based on how far you live from Chuck Norris.",
    "Chuck Norris is the reason why Waldo is hiding.",
    "Chuck Norris flew his first paper airplane when he was 4 years old.
It landed yesterday.",
    "Chuck Norris does not go hunting, the world \"hunting\" implies the
possibility of failure. Chuck Norris goes killing.",
    "Chuck Norris can hear sign language.",
    "Chuck Norris counted to infinity - twice.",
    "Death once had a near-Chuck Norris experience",
    "Chuck Norris can slam a revolving door.",
    "Chuck Norris doesn't have an ESC key on his computer, no one ever escapes.",
    "When the Boogeyman goes to sleep every night, he checks his closet
for Chuck Norris.",
    "Chuck Norris can do a wheelie on a unicycle",
    "Chuck Norris does'nt turn on the lights, he turns off the dark.",
    "Chuck Norris once got bit by a rattle snake........ After three days
of pain and agony ..................the rattle snake died",
    "Chuck Norris can kill two stones with one bird.",
    "Chuck Norris called 911 to order Chinese food and got it.....",
    "The second hardest element in the universe is Chuck Norris. The first
only comes into existance when Chuck gets excited.",
    "Chuck Norris tells a GPS which way to go.",
    "Deaf People can hear Chuck Norris talk",
    "Chuck Norris can win a game of Connect Four in only three moves.",
    "Nuclear weapons were discovered after a failed attempt to harness the
power of Chuck Norris.",
    "Chuck Norris will never have a heart attack. His heart isn't nearly
foolish enough to attack him.",
    "Chuck Norris does not fart, nothing escapes Chuck Norris",
    "Chuck Norris once had a boomerang. It was way too scared to come back.",
    "Chuck Norris can unscramble an egg.",
    "Chuck Norris can speak Brail, and hear Sign Language.",
    "chuck norris once gave a box of his old watches to a group of kids.
these kids are now known as the power rangers",
    "Chuck Norris once roudhoused kicked Hulk in the face. Now he hides in
the forest and changed his name to Shrek",
    "Chuck Norris never loses at dodgeball because the ball wants to dodge
Chuck Norris." .
    "Chuck Norris can make a stuffed animal bleed.",
    "The truth can't handle Chuck Norris"
);

$i = 0;
$last_count = $chat->messages->count;

$feed_time = time();

$latest_item_time = time();

while (true) {

    $i++;

    if (SHOW_MESSAGES) {
        Echo "Total message count: " . $skype->Messages->Count . "\n";
    }

    $skype->resetcache();

    $count = $chat->messages->count;
    $new_count = $count - $last_count;

    $messages = array();

    if (SHOW_MESSAGES) {
        echo "new: $new_count, count: $count\n";
    }
    for ($mid=1; $mid <= ($new_count); $mid++) {
        //$mid = ($count - $new_count) + 1;
        if (SHOW_MESSAGES) {
            echo " '$count - $new_count' mid:$mid\n";
        }
        $msg = $chat->messages->item($mid);
        
        array_unshift($messages, array(
            'body' => $msg->body,
            //'usr'=> ($msg->sender->fullname)?$msg->sender->fullname:$msg->sender->handle
            'usr' => $msg->sender->handle
                )
        );
        $msg = null;
        unset($msg);
    }

    $last_count = $count;
    
    
   if (SHOW_MESSAGES) {
       if (!empty($messages)) {
            print_r($messages);
        }
    }

    foreach ($messages as $msg) {

        if ($msg['usr']==SKYPEBOT_USR) {
            // dont do anything
        }elseif ((strpos($msg['body'], '!help') !== false)) { 
           $chat->SendMessage('Supported commands: !beer, !norris, !mamma, !coffee, !slap <name>');
        } elseif ((strpos($msg['body'], '!mamma') !== false)) {
            $chat->SendMessage($mamma_jokes[rand(0, (sizeof($mamma_jokes)-1))]);
        } elseif ((strpos($msg['body'], '!slap') !== false)) {
            $words = preg_split('/[\s,]+/', $msg['body']);
            if (!empty($words[1])) {
                $chat->SendMessage('/me slaps '.$words[1].' with a large trout!');
            }
        } elseif ((strpos($msg['body'], '!norris') !== false)) {
            $chat->SendMessage($chuck_norris[rand(0, (sizeof($chuck_norris)-1))]);
        } elseif ((strpos($msg['body'], '!beer') === 0)) {
            $chat->SendMessage('Here\'s a (beer) for '.$msg['usr'].', cheers!');
        } elseif ((strpos($msg['body'], '!coffee') === 0)) {
            $chat->SendMessage('Here\'s a (coffee) for '.$msg['usr'].', enjoy!');
        } elseif ((strpos($msg['body'], '!') === 0)) {
            $chat->SendMessage('I\'m afraid I can\'t do that yet, '.$msg['usr']);
        } else {

            $txt = trim($msg['body']);
            if (!empty($txt)) {
                try {
                    $tts->speak($msg['usr'] . ' says,');
                    $tts->speak($msg['body']);
                    sleep(1);
                    $tts->speak(' Oh ver!');
                    sleep(1);
                } catch (Exception $e) {

                }
            }
        }

    }

    if (defined('ATOM_FEED_URI')) {
        if ((time() - $feed_time) > (60*5)) {
      
            // create a new cURL resource
            $ch = curl_init();

            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL, ATOM_FEED_URI);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            
            if (defined('ATOM_FEED_LOGIN')) {
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC ) ;
                curl_setopt($ch, CURLOPT_USERPWD, ATOM_FEED_LOGIN);
            }
            curl_setopt($ch, CURLOPT_SSLVERSION,3); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 

            // grab URL and pass it to the browser
            $xml_string = curl_exec($ch);

            // close cURL resource, and free up system resources
            curl_close($ch);

            $news = new SimpleXMLElement($xml_string);
            foreach ($news->entry as $item) {
                $item_time = strtotime($item->published);
                if ($item_time > $latest_item_time) {
                    $send = '';
                    $send = strip_tags((string)$item->title);
                    $send .= (string) $item->link['href']."\n";
                    $chat->SendMessage($send);                    
                }

            }
            if (!empty($news->entry)) {
                $latest_item_time = strtotime($news->entry[0]->published);
            }
            $feed_time = time();

        }
    }

    sleep(1);

    if ($i == 10) {
        // this prevents a memory leak with Skype4COM
        $skype = null;
        unset($skype);
        $skype = new com("Skype4COM.Skype.1");
        $chat = $skype->chat($chat_name);
        $i = 0;

    }
    if (SHOW_MESSAGES) {
        echo "mem:" . memory_get_usage() . "\n";
    }
}

