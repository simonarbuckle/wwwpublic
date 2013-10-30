<!DOCTYPE html>
<html>
<head>
  <?php include '../include/_head.php' ?></head>
<body class="download">
  <?php include '../include/_header.php' ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="wrapper">
        <div class="columns main-page">
          <article class="column">
            <h1>Download Aria Templates</h1>
            <div class="quick-download">
              <p>
                <?php include '_current_version.php' ?></p>
            </div>
            <h3>Previous versions</h3>
            <?php
              $versions = array();
              foreach (glob("/srv/www/ariatemplates.com/builds/*.zip") as $filename) {
                $archive = basename($filename, ".zip");
                preg_match('/^ariatemplates-(?:(?P<dev>dev)-)?(?P<version>.*)$/', $archive, $matches);
                //echo "<pre>".print_r($matches, true)."</pre>";

                if (!isset($versions[$matches['version']])) {
                  $versions[$matches['version']] = array( 'dev' => false, 'prod' => false );
                }
                $build = &$versions[$matches['version']];

                if ($matches['dev'] == 'dev') {
                  $build['dev'] = true;
                } else {
                  $build['prod'] = true;
                }
                if (!isset($build['date'])) {
                  $build['date'] = date("d/m/Y", filectime($filename));
                }
              }
              krsort($versions);
            ?>
            <table class="previous hor-zebra">
              <thead>
                <tr>
                  <th scope="col">Version</th>
                  <th scope="col">Production build</th>
                  <th scope="col">Development build</th>
                  <th scope="col">Build date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 0;
                  foreach ($versions as $version => $options) {
                    $cssClass = "";
                    if ($i % 2 !== 0) {
                      $cssClass = "odd";
                    }
                ?>
                <tr class="<?php echo $cssClass; ?>
                  ">
                  <td>
                    <?php echo $version; ?></td>
                  <td>
                    <?php if ($options["prod"]) { ?>
                    <a href="/builds/ariatemplates-<?php echo $version; ?>.zip"
                      class="download" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Production Version', '
                      <?php echo $version; ?>']);">get it</a>
                  </td>
                  <?php } else { ?>
                  -
                  <?php } ?>
                  <td>
                    <?php if ($options["dev"]) { ?>
                    <a href="/builds/ariatemplates-dev-<?php echo $version; ?>.zip" class="download" onClick="javascript: _gaq.push(['_trackEvent', 'Downloads', 'Development Version', '
                      <?php echo $version; ?>']);">get it</a>
                  </td>
                  <?php } else { ?>
                  -
                  <?php } ?>
                  <td>
                    <?php echo $options["date"]; ?></td>
                </tr>
                <?php
                    $i++;
                  } //endfor
                ?></tbody>
            </table>
            <h3>It's not enough? You want more ?</h3>
            <p>
              Just go to our Github repository and
              <a href="//github.com/ariatemplates/ariatemplates/tags">browse the tags</a>
              section to get more old and dusty Aria Templates versions.
            </p>

            <h3>Nightly Builds</h3>
            <p>We currently do not provide nightly builds of the framework</p>

            <h3>Getting the source</h3>
            <p>
              If you'd like the full source code, you can check it out on our Github
              <a href="//github.com/ariatemplates/ariatemplates">repository</a>
              , or simply clone it using this command
            </p>
            <div class="mw-geshi">
              <div class="javascript source-javascript">
                <pre>git clone git://github.com/ariatemplates/ariatemplates.git</pre>
              </div>
            </div>
            <h3>Contributors</h3>
            <p>
              If your wish is to be part of it, check out our
              <a href="/contribute">contribute</a>
              section.
            </p>
            <p>
              For a list of Aria Templates forks on Github, check out our
              <a href="//github.com/ariatemplates/ariatemplates/network">network</a>
              page.
            </p>
          </article>
        </div>
      </div>
    </section>
  </div>
  <?php include '../include/_footer.html' ?></body>
</html>
