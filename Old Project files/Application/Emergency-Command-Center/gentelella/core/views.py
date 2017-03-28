from django.shortcuts import render
from django.http import HttpResponseRedirect, HttpResponse
from django.db import connection
from django.db.models.query import QuerySet
import uuid
import hashlib

from .models import AuthUserModel
from .forms import Register, Login

def index(request):
    return render(request, 'index.html')

def dead(request):
    return render(request, 'tables.html')

def LGAPageView(request):
    return render(request, 'form.html')

def NGOPageView(request):
    return render(request, 'form_advanced.html')

def SOPageView(request):
    return render(request, 'chartjs.html')

def CasualtiesPageView(request):
    return render(request, 'chartjs2.html')

def CLPageView(request):
    return render(request, 'morisjs.html')

def LoginPageView(request):
    return render(request, 'admin/login.html')

def SettingsPageView(request):
    return render(request, 'settings.html')

def RegisterPageView(request):
    #return render(request, 'admin/register_user.html')
    # if this is a POST request we need to process the form data
    if request.method == 'POST':
        # create a form instance and populate it with data from the request:
        form = Register(request.POST)
        # check whether it's valid:
        if form.is_valid():
            # process the data in form.cleaned_data as required
            # ...
            # redirect to a new URL:
            fname = form.data['fname']
            lname = form.data['lname']
            uname = form.data['uname']
            email = form.data['email']
            pword = form.data['pword']

            gen_uuid = uuid.uuid4()
            salt = uuid.uuid4().hex
            hashed_pass = hashlib.sha512(pword + salt).hexdigest()

            cursor = connection.cursor()
            result = cursor.execute("INSERT INTO emergency_command_center.auth_user_model (id, email, first_name, last_name, password, salt, username) VALUES (%s, %s, %s, %s, %s, %s, %s)", (gen_uuid, email, fname, lname, hashed_pass, salt, uname))
            return HttpResponseRedirect("/")

    # if a GET (or any other method) we'll create a blank form
    else:
        form = Register()

    return render(request, 'admin/register_user.html', {'form': form})

def LoginAuthPageView(request):

    if request.method == 'POST':

        form = Login(request.POST)

        if form.is_valid():

            username = form.data['username']
            password = form.data['password']

            cursor = connection.cursor()
            result = cursor.execute("SELECT * FROM emergency_command_center.auth_user_model WHERE username = %s", (username,))

            return HttpResponseRedirect("/")

            '''if(pword_hash == result['password']):
                return HttpResponse(pword_hash)
            else:
                return HttpResponse("Error!")'''
