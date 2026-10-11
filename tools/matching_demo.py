#!/usr/bin/env python3
"""Optional demo: python tools/matching_demo.py --blood-group O+ --location Kathmandu
This illustrative score is not clinical compatibility advice."""
import argparse
SAMPLE=[{"name":"Example A","blood_group":"O+","location":"Kathmandu","available":True,"eligible":True},{"name":"Example B","blood_group":"O+","location":"Pokhara","available":True,"eligible":True},{"name":"Example C","blood_group":"A+","location":"Kathmandu","available":False,"eligible":True}]
def score(d,loc): return min(100,50+(25 if d["eligible"] else 0)+(15 if d["available"] else 0)+(10 if loc.casefold() in d["location"].casefold() else 0))
p=argparse.ArgumentParser();p.add_argument('--blood-group',default='O+');p.add_argument('--location',default='Kathmandu');a=p.parse_args()
matches=sorted([d for d in SAMPLE if d['blood_group']==a.blood_group and d['available'] and d['eligible']],key=lambda d:score(d,a.location),reverse=True)
print('Fictional sample matches; not medical advice.')
for d in matches: print(f"{d['name']} — {d['blood_group']} — {d['location']} — score {score(d,a.location)}/100")
if not matches: print('No sample matches.')
