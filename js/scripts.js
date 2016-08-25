var Actors = { // Object Literal = Container for Data / State
    init: function (config) { // config = connector -> functions can use given Parameters
        this.config = config;

        this.setupTemplates();
        this.bindEvents();
    },
    bindEvents: function () {
        this.config.letterSelection.on('change', this.fetchActors);
    },
    setupTemplates: function () {
        this.config.actorListTemplate = Handlebars.compile(this.config.actorListTemplate);

        Handlebars.registerHelper('fullName', function (actor) {
            return actor.first_name + ' ' + actor.last_name;
        });
    },
    fetchActors: function () {
        var self = Actors;

        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: self.config.form.serialize(),
            dataType: 'json', // data type to expect
            success: function (results) {
                self.config.actorsList.empty();
                if(results[0]) {
                    //console.log(results);
                    self.config.actorsList.append(self.config.actorListTemplate(results));
                } else {
                    self.config.actorsList.append('<li>Nothing found!</li>');
                }
            }
        });
    }
};

Actors.init({
    letterSelection: $('#q'),
    form: $('#actor-selection'),
    actorListTemplate: $('#actor_list_template').html(),
    actorsList: $('ul.actors_list')
});
