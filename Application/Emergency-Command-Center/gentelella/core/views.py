from django.shortcuts import render
from django.contrib.auth import login
from django.http import HttpResponseRedirect
import models

from .forms import Register

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
            return HttpResponseRedirect('/thanks/')

    # if a GET (or any other method) we'll create a blank form
    else:
        form = Register()

    return render(request, 'admin/register_user.html', {'form': form})

def GetRegistration(request):
    # if this is a POST request we need to process the form data
    if request.method == 'POST':
        # create a form instance and populate it with data from the request:
        form = Register(request.POST)
        # check whether it's valid:
        if form.is_valid():
            # process the data in form.cleaned_data as required
            # ...
            # redirect to a new URL:
            return HttpResponseRedirect('/thanks/')

    # if a GET (or any other method) we'll create a blank form
    else:
        form = Register()

    return render(request, 'name.html', {'form': form})