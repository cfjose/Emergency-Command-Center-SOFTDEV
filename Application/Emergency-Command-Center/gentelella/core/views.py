from django.shortcuts import render
from django.contrib.auth import login
from django.http import HttpResponseRedirect
import models

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