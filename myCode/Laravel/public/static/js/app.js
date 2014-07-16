App = Ember.Application.create({
    LOG_TRANSITIONS: true
});

App.ApplicationAdapter = DS.RESTAdapter.extend({
    namespace: 'api/v1'
});

App.Store = DS.Store.extend({
    adapter: 'App.ApplicationAdapter'
});

App.Router.map(function() {
    this.resource('photo', {path: "/photo/:photo_id"});
    this.resource('user', {path: "/user/:user_id"});
});

App.IndexRoute = Ember.Route.extend({
    model: function(){
        return this.store.find('photo');
    }
});

App.PhotoRoute = Ember.Route.extend({
    model: function(params){
        return this.store.find('photo', params.photo_id);
    }
});

App.UserRoute = Ember.Route.extend({
    model: function(params){
        return this.store.find('user', params.user_id);
    }
});


var attr = DS.attr;             // This cuts my writing. Inside the model i use attr instead of DS.attr

App.Photo = DS.Model.extend({
    user_id: attr("number"),    // The expected value is a number
    url: attr("string"),        // The expected value is a string
    title: attr("string"),
    description: attr("string"),
    category: attr("number"),

    fullUrl: function(){        // Another value that depends on core values.
        return "/files/" + this.get("url");
    }.property('url'),

    backgroundImage: function(){// This depends on another value but not on core ones
        return 'background: url("' + this.get("fullUrl") + '") no-repeat; ';
    }.property('fullUrl')

});


App.User = DS.Model.extend({
    name: attr("string"),
    lastname: attr("string"),
    username: attr("string"),

    fullname: function(){
        return this.get('name') + " " + this.get('lastname');
    }.property("name", "lastname")
});