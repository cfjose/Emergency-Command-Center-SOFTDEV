from cassandra.cqlengine import columns
from cassandra.cqlengine.models import Model

class AuthUserModel(Model):
    id = columns.UUID(primary_key=True, required=True)
    last_name = columns.Text()
    first_name = columns.Text()
    email = columns.Text()
    username = columns.Text()
    password = columns.Text()
    salt = columns.Text()

class DashModel(Model):
    dash_id = columns.UUID(primary_key=True, required=True)
    dash_name = columns.Text()

class InfoModel(Model):
    info_id = columns.UUID(primary_key=True, required=True)
    info_details = columns.Text()
    info_type = columns.Text()

class InfoTypeModel(Model):
    info_type_id = columns.UUID(primary_key=True, required=True)
    info_type_name = columns.Text()

class ModuleModel(Model):
    module_id = columns.UUID(primary_key=True, required=True)
    module_name = columns.Text()

class GovAgencyModel(Model):
    gov_id = columns.UUID(primary_key=True, required=True)
    gov_name = columns.Text()
