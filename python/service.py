import argparse
import os
import subprocess
import sys

import psutil as psutil

parser = argparse.ArgumentParser(description='Inference server service script.')
parser.add_argument('--stop', dest='stop', action='store_true', default=False, help='stop active server')
args = parser.parse_args()


def is_running(pid):
    """ Check For the existence of a unix pid. """
    try:
        os.kill(pid, 0)
    except OSError:
        return False
    else:
        return True


path = '../storage/app/python/'
pidfilename = path + 'server.pid'

running = False
if os.path.exists(pidfilename):
    with open(pidfilename, 'r') as pidfile:
        pid = int(pidfile.readline())
        if is_running(pid):
            running = True
            if args.stop:
                p = psutil.Process(pid)
                p.terminate()
                exit(0)
            print('server already running')
            pidfile.close()
            exit(0)
        else:
            running = False

if not running:
    print('starting server.py...')
    with open(path + 'log/stdout.log', 'wb') as out, open(path + 'log/stderr.log', 'wb') as err:
        process = subprocess.Popen([sys.executable, 'server.py'], close_fds=True, stdout=out, stderr=err)
        # Write PID file
        pidfile = open(pidfilename, 'w')
        pidfile.write(str(process.pid))
        pidfile.close()
    print('started server.py')
