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
                  $versions = array(
                    '1.4.10' => array( 'date' => "26/09/2013", "prod" => true, "dev" => true ),
                    '1.4.9' => array( 'date' => "30/08/2013", "prod" => true, "dev" => true ),
                    '1.4.8' => array( 'date' => "23/07/2013", "prod" => true, "dev" => true ),
                    '1.4.7' => array( 'date' => "01/07/2013", "prod" => true, "dev" => true ),
                    '1.4.6' => array( 'date' => "14/06/2013", "prod" => true, "dev" => true ),
                    '1.4.5' => array( 'date' => "22/05/2013", "prod" => true, "dev" => true ),
                    '1.4.4' => array( 'date' => "22/05/2013", "prod" => true, "dev" => true ),
                    '1.4.3' => array( 'date' => "29/04/2013", "prod" => true, "dev" => true ),
                    '1.4.2' => array( 'date' => "15/04/2013", "prod" => true, "dev" => true ),
                    '1.4.1' => array( 'date' => "11/04/2013", "prod" => true, "dev" => true ),
                    '1.3.7' => array( 'date' => "19/03/2013", "prod" => true, "dev" => true ),
                    '1.3.6' => array( 'date' => "25/02/2013", "prod" => true, "dev" => true ),
                    '1.3.5' => array( 'date' => "05/02/2013", "prod" => true, "dev" => true ),
                    '1.3.4' => array( 'date' => "11/01/2013", "prod" => true, "dev" => true ),
                    '1.3.3' => array( 'date' => "20/12/2012", "prod" => true, "dev" => true ),
                    '1.3.2' => array( 'date' => "04/12/2012", "prod" => true, "dev" => true ),
                    '1.3.1' => array( 'date' => "14/11/2012", "prod" => false, "dev" => true ),
                    '1.2.4' => array( 'date' => "20/08/2012", "prod" => false, "dev" => true ),
                    '1.2.3' => array( 'date' => "30/07/2012", "prod" => false, "dev" => true ),
                    '1.2.2' => array( 'date' => "06/07/2012", "prod" => false, "dev" => true ),
                    '1.2.1' => array( 'date' => "18/06/2012", "prod" => false, "dev" => true ),
                    '1.2.0' => array( 'date' => "06/06/2012", "prod" => true, "dev" => true )
                  );
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
