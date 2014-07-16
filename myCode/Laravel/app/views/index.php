<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Webapp with EmberJs and Laravel4</title>
    <link rel="stylesheet" href="/bower_components/foundation/css/foundation.css" />
    <link rel="stylesheet" href="/static/css/style.css" />
</head>
<body>

<script type="text/x-handlebars">

    <!-- The navigation top-bar -->
    <nav class="top-bar" data-topbar>

        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Photo Upload</a></h1>
            </li>
        </ul>

        <section class="top-bar-section">

            <!-- Left Nav Section -->
            <ul class="left">
                <li class="has-dropdown">
                    <a href="#">Categories</a>
                    <ul class="dropdown">
                        <li><a href="#">Category1</a></li>
                        <li><a href="#">Category2</a></li>
                        <li><a href="#">Category3</a></li>
                        <li><a href="#">Category4</a></li>
                    </ul>
                </li>
            </ul>

        </section>

        <div class="clearfix"></div>

    </nav><!-- END Navigation -->

    <!-- Content -->
    <div style="margin-top: 50px;">
        {{outlet}}
    </div><!-- END Content -->

</script>

<script type="text/x-handlebars" data-template-name="index">
    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 custom-grid-ul">
        {{#each}}

        <li {{bind-attr style="backgroundImage"}}>
        <div class="custom-grid">
            {{#link-to 'photo' this}}<h5 class="custom-header">{{title}}</h5>{{/link-to}}
            <span>Author: {{user_id}}</span>
        </div>
        </li>

        {{/each}}
    </ul>
</script>

<script type="text/x-handlebars" data-template-name="photo">
    <div style="text-align: center;">
        <h4>{{title}}</h4><br>
        <img {{bind-attr src="fullUrl" alt="title"}}><br>
        <span>Author: {{#link-to 'user' user_id}}{{user_id}}{{/link-to}}</span>
    </div>
</script>

<script type="text/x-handlebars" data-template-name="user">
    <h2>Hello: {{fullname}} </h2>
</script>

<script src="/bower_components/jquery/dist/jquery.js"></script>
<script src="/bower_components/foundation/js/foundation.min.js"></script>
<script src="/bower_components/handlebars/handlebars.js"></script>
<script src="/bower_components/ember/ember.js"></script>
<script src="/bower_components/ember-data/ember-data.js"></script>
<script src="/static/js/app.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
