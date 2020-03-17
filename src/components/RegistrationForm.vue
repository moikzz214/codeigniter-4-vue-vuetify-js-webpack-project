<template>
<v-content>
      <v-container fluid fill-height >
        <v-layout align-center justify-center >
          <v-flex xs12 sm8 md6
          >
            <v-card class="elevation-12">
              <v-toolbar color="primary" dark flat>
                <v-toolbar-title>{{title}}</v-toolbar-title> 
              </v-toolbar>
              <v-card-text>
                <v-snackbar
                  v-model="snackbar"
                  absolute
                  top
                  right
                  color="success"
                >
                  <span>Registration successful!</span>
                  <v-icon dark>mdi-checkbox-marked-circle</v-icon>
                </v-snackbar>
              <v-form ref="form" @submit.prevent="submit">

              <v-row   >
                <v-col cols="12" md="6" xs="12"  sm="12" >
                    <v-text-field
                        ref="first"
                        v-model="form.first"
                        :rules="rules.name"
                        label="First Name"
                        name="fname"
                        prepend-icon="mdi-account"
                        :error-messages="errorMessages"
                        type="text"
                        required
                        clearable
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="6" xs="12"  sm="12" >
                    <v-text-field
                        ref="last"
                        v-model="form.last"
                        :rules="rules.name"
                        label="Last Name"
                        name="lname"
                        prepend-icon="mdi-account"
                        type="text"
                        :error-messages="errorMessages"
                        required
                        clearable
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="6" xs="12"  sm="12" >
                        <v-menu
                            ref="menu1"
                            v-model="menu1" 
                            :close-on-content-click="false"
                            transition="scale-transition"
                            offset-y
                            max-width="290px"
                            min-width="290px"
                            >
                            <template v-slot:activator="{ on }">
                                <v-text-field
                                ref="dob"
                                v-model="dobFormatted"
                                :rules="rules.name"
                                name="dob"
                                label="Date of Birth"
                                hint="MM/DD/YYYY format"
                                persistent-hint
                                :error-messages="errorMessages"
                                prepend-icon="mdi-calendar"
                                @blur="date = parseDate(dobFormatted)"
                                v-on="on"
                                required
                                clearable
                                ></v-text-field>
                            </template>
                            <v-date-picker v-model="date" no-title @input="menu1 = false"></v-date-picker>
                            </v-menu>
                </v-col>
                <v-col cols="12" md="6" xs="12"  sm="12" >
                     <v-select
                     ref="gender"
                      v-model="form.gender"
                      :rules="rules.name"
                      :items="gender"
                      label="Gender" 
                      name="gender"
                      :error-messages="errorMessages"
                      prepend-icon="mdi-human-male-female"
                      required
                    ></v-select>
                </v-col>
                 <v-col cols="12" md="6" xs="12"  sm="12" >
                   <v-text-field
                        ref="mobile"
                        v-model="form.mobile"
                        :rules="rules.name"
                        :error-messages="errorMessages"
                        label="Mobile Number"
                        name="mobile"
                        prepend-icon="mdi-phone"
                        type="number"
                        required
                        clearable
                    ></v-text-field>
                </v-col> 

                 <v-col cols="12" md="6" xs="12"  sm="12" >
                     <v-text-field
                      ref="email"
                      v-model="form.email"
                      :rules="rules.email"
                      :error-messages="errorMessages"
                      label="E-mail"
                      type="text"
                      name="email"
                       prepend-icon="mdi-email"
                    ></v-text-field>
                </v-col>

                  <v-col cols="12" md="6" xs="12"  sm="12" >
                    <v-autocomplete
                    ref="country"
                    v-model="form.country"
                    :rules="rules.name"
                    :items="country"
                    name="country"
                    label="Nationality" 
                    prepend-icon="mdi-flag"
                    :error-messages="errorMessages"
                    required
                  ></v-autocomplete>
                </v-col>

                  <v-col cols="12" md="6" xs="12"  sm="12" >
                     <v-autocomplete
                      ref="states"
                      v-model="form.states"
                      :rules="rules.name"
                      :error-messages="errorMessages"
                      :items="states"
                      name="states"
                      label="States" 
                      prepend-icon="mdi-map-marker-path"
                      required
                    ></v-autocomplete>
                </v-col>

                 <v-col cols="12" md="12" xs="12"  sm="12" >
                    <v-text-field
                      ref="address"
                      v-model="form.address"  
                      label="Current Home Address"
                       prepend-icon="mdi-home"
                    ></v-text-field>
                  </v-col>
            </v-row> 
 
                </v-form>
              </v-card-text>
              <v-card-actions>
                  <v-spacer></v-spacer> 
                  <v-spacer></v-spacer> 
                <v-btn color="primary"  @click="submit">Register Now</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
   
</template>

<script>
  export default {
    props: ['postTitle', 'requiredFields'],
    data(vm){
          const defaultForm = Object.freeze({
            first: '',
            last: '',  
            dob: '',
            gender: '',
            mobile: '',
            email: '', 
            country: '',
            states: '',
          })

          return{
              title: this.postTitle,
              // fldsreq: JSON.parse(this.requiredFields),
              form: Object.assign({}, defaultForm),
              date: new Date().toISOString().substr(0, 10), 
              states: ['Abu Dhabi', 'Ajman', 'Dubai', 'Fujairah', 'Ras Al Khaimah', 'Sharjah', 'Umm Al Quwain'],
              gender: ['Male', 'Female'],
              country: ['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Anguilla', 'Antigua &amp; Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia &amp; Herzegovina', 'Botswana', 'Brazil', 'British Virgin Islands', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Cape Verde', 'Cayman Islands', 'Chad', 'Chile', 'China', 'Colombia', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D Ivoire', 'Croatia', 'Cruise Ship', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Estonia', 'Ethiopia', 'Falkland Islands', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Polynesia', 'French West Indies', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kuwait', 'Kyrgyz Republic', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Mauritania', 'Mauritius', 'Mexico', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Norway', 'Oman', 'Pakistan', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Pierre &amp; Miquelon', 'Samoa', 'San Marino', 'Satellite', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'South Africa', 'South Korea', 'Spain', 'Sri Lanka', 'St Kitts &amp; Nevis', 'St Lucia', 'St Vincent', 'St. Lucia', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', "Timor L'Este", 'Togo', 'Tonga', 'Trinidad &amp; Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks &amp; Caicos', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Venezuela', 'Vietnam', 'Virgin Islands (US)', 'Yemen', 'Zambia', 'Zimbabwe'],
              dobFormatted: '', 
              rules: { 
                  name: [val => (val || '').length > 0 || 'This field is required'],
                  email: [value => {
                      const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                      return pattern.test(value) || 'Invalid e-mail.'
                  }],
              }, 
              menu1: false,
              conditions: false, 
              snackbar: false,
              terms: false,
              formHasErrors: false,
              errorMessages: '',
              defaultForm,
          }
    }, 
 
    computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      }, 
    },

    watch: {
      date (val) {
        this.dobFormatted = this.formatDate(this.date)
      },
      
    },
    mounted(){
     // console.log(this.requiredFields);
    },
    methods: {
      formatDate (date) {
        if (!date) return null

        const [year, month, day] = date.split('-')
        return `${month}/${day}/${year}`
      },
      parseDate (date) {
        if (!date) return null

        const [month, day, year] = date.split('/')
        return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
      },
      resetForm () {
        this.errorMessages = []
        this.formHasErrors = false

        Object.keys(this.form).forEach(f => {
          this.$refs[f].reset()
        })
      },
      submit () {
        this.formHasErrors = false

        Object.keys(this.form).forEach(f => {
          if (!this.form[f]){ this.formHasErrors = true; }
          else{ this.formHasErrors = false; }

           this.$refs[f].validate(true)

        })
      
        if( this.formHasErrors === false){
        
            let postData = {};
            postData['contents'] = this.form; 
           
            axios.post('/create', postData)  
            .then(response => { 
                console.log(response);
            }).catch(error => { 
                console.log(error );
            });
 

        }
          
      },
    },
  }
</script>