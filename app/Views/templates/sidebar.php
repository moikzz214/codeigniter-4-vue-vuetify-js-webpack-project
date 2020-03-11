<v-navigation-drawer v-model="drawer" app>
    <v-list dense>
    <v-list-item @click="">
        <v-list-item-action>
        <v-icon>mdi-home</v-icon>
        </v-list-item-action>
        <v-list-item-content>
        <v-list-item-title>Home</v-list-item-title>
        </v-list-item-content>
    </v-list-item>
    <v-list-item @click="">
        <v-list-item-action>
        <v-icon>mdi-email</v-icon>
        </v-list-item-action>
        <v-list-item-content>
        <v-list-item-title>Contact</v-list-item-title>
        </v-list-item-content>
    </v-list-item>
    </v-list>
</v-navigation-drawer>

<v-app-bar
    app
    color="indigo"
    dark
>
    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    <v-toolbar-title>Application</v-toolbar-title>
</v-app-bar>
