<?php
/**
 * Parses and format one fortune contents to HTML
 *
 * @param  Fortune  $fortune
 *
 * @return string
 */
function fortunize(Fortune $fortune)
{
  $r = "";

  foreach (explode("\n", $fortune->getContent()) as $i => $line)
  {
    if (!trim($line))
    {
      continue;
    }

    $className = 0 === $i % 2 ? 'odd' : 'even';

    if (preg_match('/^<(\w+)>\s?(.*)$/i', trim($line), $m))
    {
      $nick = $m[1];
      $quote = htmlspecialchars($m[2], ENT_QUOTES, sfConfig::get('sf_charset'));
      $r .= sprintf("<dt class=\"%s\">&lt;%s&gt;</dt><dd><q>%s</q></dd>\n", $className, $nick, $quote);
    }
    else
    {
      $r .= sprintf("<dt>&nbsp;</dt><dd>%s</dd>\n", trim($line));
    }
  }

  return sprintf('<dl>%s</dl>', $r);
}
