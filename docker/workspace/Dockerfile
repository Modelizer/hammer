FROM laradock/workspace:2.0-71

# Remove Faillog and Lastlog to reduce the size of the final image.
RUN rm /var/log/lastlog /var/log/faillog

#####################################
# Non-Root User:
#####################################

# Add a non-root user to prevent files being created with root permissions on host machine.
ARG PUID=1000
ARG PGID=1000

ENV PUID ${PUID}
ENV PGID ${PGID}

RUN groupadd -g ${PGID} admin && \
    useradd -u ${PUID} -g admin -m mudassir

USER root
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set default work directory
WORKDIR /var/www
