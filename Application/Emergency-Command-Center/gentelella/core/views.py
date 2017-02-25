from django.shortcuts import render

def index(request):
    return render(request, 'index.html')

def dead(request):
    return render(request, 'tables.html')