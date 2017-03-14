from django import forms

class Register(forms.Form):
    fname = forms.CharField(label='First name', max_length=50)
    lname = forms.CharField(label='Last name', max_length=50)
    uname = forms.CharField(label='Username', max_length=50)
    email = forms.EmailField(label='Email', max_length=100)
    pword = forms.CharField(label='Password', widget=forms.PasswordInput(attrs=None ,render_value=True))