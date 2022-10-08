FROM python:3.10-slim
WORKDIR /app
COPY builder/Pipfile /app/Pipfile
COPY builder/Pipfile.lock /app/Pipfile.lock
RUN pip install pipenv
RUN pipenv install
COPY builder /app/builder
COPY builder/.env /app/builder/.env
WORKDIR /app/builder
CMD ["python", "main.py"]